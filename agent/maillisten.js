var databaseUrl = 'paramadatastore2'; // 'username:password@example.com/mydb'
var collections = ['docinbox','documents','users','projects','opportunities','tenders'];
var db = require('mongojs').connect(databaseUrl, collections);

//var doc_path = '/Library/WebServer/Documents/pnu/public/storage/';

var doc_path = '/var/kickstart/pnu/public/storage/';


var fs = require('fs');

var MailListener = require('mail-listener');

var mailListener = new MailListener({
  username: 'paramanusa@gmail.com',
  password: 'Parama0101',
  host: 'imap.gmail.com',
  port: 993, // imap port
  secure: true, // use secure connection
  mailbox: 'INBOX', // mailbox to monitor
  markSeen: true, // all fetched email willbe marked as seen and not fetched next time
  fetchUnreadOnStart: false // use it only if you want to get all unread email on lib start. Default is `false`
});

/*
var mailListener = new MailListener({
  username: 'input@paramanusa.co.id',
  password: 'inpnu2013',
  host: 'mail.paramanusa.co.id', //202.146.241.30
  port: 143, // imap port
  secure: false, // use secure connection
  mailbox: 'INBOX', // mailbox to monitor
  markSeen: true, // all fetched email willbe marked as seen and not fetched next time
  fetchUnreadOnStart: false // use it only if you want to get all unread email on lib start. Default is `false`
});
*/


mailListener.start();

mailListener.on('server:connected', function(){
  console.log('imapConnected');
});

mailListener.on('mail:arrived', function(id){
  console.log('new mail arrived with id:' + id);
});

mailListener.on('mail:parsed', function(mail){
  // do something with mail object including attachments
    //console.log('emailParsed', mail);

    fs.mkdir('attachments/'+ mail.uid);

    if(typeof mail.attachments === 'undefined' || mail.attachments.length <= 0){
        console.log('no attachment');
    }else{
        for(f = 0; f < mail.attachments.length ; f++){
            var att = mail.attachments[f];
            var filepath = 'attachments/'+ mail.uid + '/' + att['fileName'];
            fs.writeFile(filepath,att['content']);
        }
    }

    var filepath = 'attachments/'+ mail.uid + '/body.html';
    fs.writeFile(filepath,mail.html );

    var filepath = 'attachments/'+ mail.uid + '/body.txt';
    fs.writeFile(filepath,mail.text );

    if(mail.subject.match(/project/i) || mail.subject.match(/proj/i)){
        mail.isProject = true;
    }

    if(mail.subject.match(/opportunity/i) || mail.subject.match(/opp/i)){
        mail.isOpportunity = true;
    }

    if(mail.subject.match(/tender/i) || mail.subject.match(/tend/i)){
        mail.isTender = true;
    }

    var from = mail.from[0];
    from = from.address;

    console.log('from: ' + from);

    db.users.findOne({ email: from },function(err,user){
        if(err){
            console.log('err: ' + err);
        }else if( user !== null ){
            //console.log(user);

            var dt = tempdoc();

            dt.creatorId = user['_id'];
            dt.creatorName = user['fullname'];
            dt.docDepartment = user['department'];

            dt.docCategory = getcat(user['department']);

            dt.title = mail.subject;

            db.documents.save(dt, function(err, saved) {
                if( err || !saved ){
                    console.log('document not saved');
                }else{
                    console.log('document saved : ' + saved._id );
                    var attpath = doc_path + saved._id;

                    fs.mkdirSync(attpath, 0777 );

                    var filepath = attpath + '/body.html';

                    console.log(filepath);

                    fs.writeFile(filepath,mail.html);

                    var docFilename = mail.subject;

                    var docfiledata = {
                        'name': 'body.html',
                        'type': 'text/html',
                        'tmp_name': '',
                        'error': 0,
                        'size': 0,
                        'uploadTime': new Date()
                    };

                    var filelist = [];

                    if(typeof mail.attachments === 'undefined' || mail.attachments.length <= 0){
                        console.log('no attachment');
                    }else{
                        for(f = 0; f < mail.attachments.length ; f++){
                            var att = mail.attachments[f];
                            var filepath = attpath + '/' + att['fileName'];
                            fs.writeFile(filepath,att['content']);

                            var afile = {
                              name : att['fileName'],
                              type : att['contentType'],
                              tmp_name : '',
                              error : 0,
                              size : att['length'],
                              uploadTime : new Date()
                            };

                            filelist.push(afile);

                        }

                    }

                    db.documents.update({ _id: saved._id }, {$set: {docFileList: filelist, docFiledata: docfiledata, docFilename: docFilename } }, function(err, updated) {
                        if( err || !updated ) console.log("User not updated");
                        else console.log("User updated");
                    });

                    /*
                    fs.mkdir(attpath,777,function(err){
                        if(err){
                            console.log('failed to make dir');
                        }else{
                            var filepath = attpath + '/body.html';
                            fs.writeFile(filepath , mail.html );
                        }

                    });
                    */
                }
            });

            console.log(dt);
        }
    });

    db.docinbox.save( mail, function(err, saved) {
        if( err || !saved ) {
            console.log('failed to save mail');
        }else{
            console.log('mail saved');
        }
    });



    //console.log(doctemplate);



  // mail processing code goes here
});

// it's possible to access imap object from node-imap library for performing additional actions. E.x.
//mailListener.imap.move(:msguids, :mailboxes, function(){})

function tempdoc(){

    return {

        'title': '',
        'docFormat': 'email',
        'access': 'confidential',
        'interaction': 'ro',
        'docTag': '',
        'effectiveDate': new Date(),
        'expiryDate': '',
        'alert': 'No',
        'alertStart': 0,
        'docShare': '',
        'docApprovalRequest': '',
        'docDepartment': '',
        'docCategoryLabel': 'E-mails',
        'docCategoryParents': '',
        'docCategory': '',
        'docOriginalTemplate': 'none',
        'docRemarks': '',
        'docRevisionOf': '',
        'docProject': '',
        'docProjectId': '',
        'docProjectTitle': '',
        'docTender': '',
        'docTenderId': '',
        'docTenderTitle': '',
        'docOpportunity': '',
        'docOpportunityId': '',
        'docOpportunityTitle': '',
        'expiring': 0,
        'createdDate': new Date(),
        'lastUpdate': new Date(),
        'creatorName': '',
        'creatorId': '',
        'useAsTemplate': 'No',
        'sharedEmails': [],
        'sharedIds': [],
        'approvalRequestEmails': [],
        'approvalRequestIds': [],
        'docFilename': '',
        'docFiledata': {},
        'docFileList': '',
        'docEmailInput': 1,
        'tags': []
    }

}

function getcat(dept){
    var defcat = {
        'general':'general_correspondences_incoming_emails',
        'outdoor_sales':'os_general_correspondences_incoming_emails',
        'indoor_sales':'is_general_correspondences_incoming_emails',
        'project_control':'pc_correspondences_incoming_emails',
        'bod':'bod_general_incoming_emails',
        'president_director':'pd_correspondences_incoming_emails',
        'operations_director':'od_correspondences_incoming_emails',
        'finance_hr_director':'fa_correspondences_incoming_emails',
        'finance_pusat':'fa_correspondences_incoming_emails',
        'finance_kemang':'fa_correspondences_incoming_emails',
        'finance_balikpapan':'fabp_correspondences_incoming_emails',
        'sales_kemang':'is_general_correspondences_incoming_emails',
        'sales_balikpapan':'smbp_general_correspondences_incoming_emails',
        'tender_balikpapan':'btbp_general_correspondences_incoming_emails',
        'hr_admin':'fa_correspondences_incoming_emails',
        'warehouse':'warehouse_incoming_emails',
        'qc':'qc_incoming_emails',
        'clients':'client_general_incoming_emails',
        'principal_vendor':'vendor_general_incoming_emails',
        'subcon':'subcon_incoming_emails'
    }

    return defcat[dept];
}

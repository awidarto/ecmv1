var databaseUrl = 'paramadatastore'; // 'username:password@example.com/mydb'
var collections = ['docinbox','documents','users','projects','opportunities','tenders'];
var db = require('mongojs').connect(databaseUrl, collections);

var fs = require('fs');

var MailListener = require('mail-listener');

var mailListener = new MailListener({
  username: 'kickstartlab@gmail.com',
  password: 'pisangkeju',
  host: 'imap.gmail.com',
  port: 993, // imap port
  secure: true, // use secure connection
  mailbox: 'INBOX', // mailbox to monitor
  markSeen: true, // all fetched email willbe marked as seen and not fetched next time
  fetchUnreadOnStart: false // use it only if you want to get all unread email on lib start. Default is `false`
});

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


    db.docinbox.save( mail, function(err, saved) {
        if( err || !saved ) {
        }else{
            console.log('failed to save mail');
        }
    });

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

            console.log(dt);
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
        'docCategoryLabel': '',
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
        'docFileList': [],
        'tags': []
    }

}

function getcat(dept){
    var defcat = {
        'general':'General',
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

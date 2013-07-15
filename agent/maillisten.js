var databaseUrl = 'paramadatastore2'; // "username:password@example.com/mydb"
var collections = ['docinbox','documents','users','projects','opportunities','tenders'];
var db = require('mongojs').connect(databaseUrl, collections);

var fs = require('fs');

var MailListener = require("mail-listener");

var mailListener = new MailListener({
  username: "kickstartlab@gmail.com",
  password: "pisangkeju",
  host: "imap.gmail.com",
  port: 993, // imap port
  secure: true, // use secure connection
  mailbox: "INBOX", // mailbox to monitor
  markSeen: true, // all fetched email willbe marked as seen and not fetched next time
  fetchUnreadOnStart: false // use it only if you want to get all unread email on lib start. Default is `false`
});

mailListener.start();

mailListener.on("server:connected", function(){
  console.log("imapConnected");
});

mailListener.on("mail:arrived", function(id){
  console.log("new mail arrived with id:" + id);
});

mailListener.on("mail:parsed", function(mail){
  // do something with mail object including attachments
    console.log("emailParsed", mail);

    fs.mkdir('attachments/'+ mail.uid);

    for(f = 0; f < mail.attachments.length ; f++){
        var att = mail.attachments[f];
        var filepath = 'attachments/'+ mail.uid + '/' + att['fileName'];
        fs.writeFile(filepath,att['content']);
    }

    if(mail.subject.match(/project/i) || mail.subject.match(/proj/i)){
        mail.isProject = true;
    }

    if(mail.subject.match(/opportunity/i) || mail.subject.match(/opp/i)){
        mail.isOpportunity = true;
    }

    if(mail.subject.match(/tender/i) || mail.subject.match(/tend/i)){
        mail.isTender = true;
    }


    db.inbox.save( mail, function(err, saved) {
        if( err || !saved ) {
        }else{
            console.log('failed to save tweet');
        }
    });

    var from = mail.from[0];
    from = from.address;

    console.log(from);

    db.users.findOne({ email: from },function(err,user){
        if( err || !user){
            console.log('no user');
        }else{
            console.log(user);
        }
    });


    var doctemplate = tempdoc();



  // mail processing code goes here
});

// it's possible to access imap object from node-imap library for performing additional actions. E.x.
//mailListener.imap.move(:msguids, :mailboxes, function(){})

function getcreator( email ){

    db.users.findOne({ email: email },function(err,user){
        if( err || !user){
            console.log('no user');
        }else{
            console.log(user);
        }
    });
}

function tempdoc(){

    return {

        "title": "",
        "access": "confidential",
        "alert": "Yes",
        "alertStart": NumberLong(10),
        "approvalRequestEmails": [],
        "approvalRequestIds": [],
        "createdDate": ISODate(),
        "creatorId": "",
        "creatorName": "",
        "deleted": false,
        "docApprovalRequest": "",
        "docCategory": "",
        "docCategoryLabel": "",
        "docCategoryParents": "",
        "docDepartment": "",
        "docFileList": [],
        "docFiledata": {},
        "docFilename": "",
        "docFormat": "email",
        "docOpportunity": "",
        "docOpportunityId": "",
        "docOpportunityTitle": "",
        "docOriginalTemplate": "none",
        "docProject": "",
        "docProjectId": "",
        "docProjectTitle": "",
        "docRemarks": "",
        "docRevisionOf": "",
        "docShare": "",
        "docTag": "",
        "docTender": "",
        "docTenderId": "",
        "docTenderTitle": "",
        "effectiveDate": ISODate(),
        "expiring": NumberInt(2),
        "expiryDate": ISODate(),
        "interaction": "ro",
        "lastUpdate": ISODate(),
        "sharedEmails": [],
        "sharedIds": [],
        "tags": [],
        "templateName": "",
        "templateNumberStart": "1",
        "useAsTemplate": "No"
    }

}

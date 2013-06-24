var MailListener = require("mail-listener");

var mailListener = new MailListener({
  username: "bolongsox@gmail.com",
  password: "masukajadeh",
  host: "imap.gmail.com",
  port: 993, // imap port
  secure: true, // use secure connection
  mailbox: "INBOX", // mailbox to monitor
  markSeen: false, // all fetched email willbe marked as seen and not fetched next time
  fetchUnreadOnStart: false // use it only if you want to get all unread email on lib start. Default is `false`
});

mailListener.start();

mailListener.on("server:connected", function(){
  console.log("imapConnected");
});

mailListener.on("mail:arrived", function(id){
  console.log("new mail arrived with id:" + id);
});

//mailListener.on("mail:parsed", function(mail){
  // do something with mail object including attachments
  //console.log("emailParsed", mail.attachments);
  // mail processing code goes here
//});

// it's possible to access imap object from node-imap library for performing additional actions. E.x.
//mailListener.imap.move(:msguids, :mailboxes, function(){}) 
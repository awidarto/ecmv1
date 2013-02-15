
/** activities indexes **/
db.getCollection("activities").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** clients indexes **/
db.getCollection("clients").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** content indexes **/
db.getCollection("content").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** documents indexes **/
db.getCollection("documents").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** employees indexes **/
db.getCollection("employees").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** invoices indexes **/
db.getCollection("invoices").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** messages indexes **/
db.getCollection("messages").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** opportunities indexes **/
db.getCollection("opportunities").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** projects indexes **/
db.getCollection("projects").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** quotations indexes **/
db.getCollection("quotations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tags indexes **/
db.getCollection("tags").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** tenders indexes **/
db.getCollection("tenders").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** users indexes **/
db.getCollection("users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** vendors indexes **/
db.getCollection("vendors").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** activities records **/
db.getCollection("activities").insert({
  "_id": ObjectId("511bcd854325a2aa04010000"),
  "event": "document.create",
  "timestamp": ISODate("2013-02-13T17:29:41.178Z"),
  "creator_id": ObjectId("50f3bf264325a2de0c000000"),
  "creator_name": "Andy K. Awidarto",
  "updater_id": ObjectId("50f3bf264325a2de0c000000"),
  "updater_name": "Andy K. Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "template",
  "doc_id": ObjectId("511bcd854325a2aa04000000"),
  "doc_title": "Invoice Template",
  "doc_filename": "INVOICE.pdf",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511bd04e4325a2e604000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-13T17:41:34.623Z"),
  "creator_id": ObjectId("50f3bf264325a2de0c000000"),
  "creator_name": "Andy K. Awidarto",
  "updater_id": ObjectId("50f3bf264325a2de0c000000"),
  "updater_name": "Andy K. Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "template",
  "doc_id": ObjectId("511bcd854325a2aa04000000"),
  "doc_title": "Invoice Template",
  "doc_filename": "INVOICE.pdf",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c785d4325a24302070000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T05:38:37.869Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "general",
  "doc_id": ObjectId("50f991e54325a28a1d000000"),
  "doc_title": "Test auto Project",
  "doc_filename": "",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c785d4325a24302080000"),
  "event": "document.share",
  "timestamp": ISODate("2013-02-14T05:38:37.870Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "sharer_id": ObjectId("50d433404325a24c04000000"),
  "sharer_name": "Andi Karsono Awidarto",
  "shareto": "andy.awidarto@gmail.com",
  "doc_id": ObjectId("50f991e54325a28a1d000000"),
  "doc_filename": "",
  "doc_title": "Test auto Project"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c7d434325a2b80d000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T05:59:31.899Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "subcon",
  "doc_id": ObjectId("510417d14325a2be60000000"),
  "doc_title": "test document access",
  "doc_filename": "",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c7d434325a2b80d010000"),
  "event": "document.share",
  "timestamp": ISODate("2013-02-14T05:59:31.900Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "sharer_id": ObjectId("50d433404325a24c04000000"),
  "sharer_name": "Andi Karsono Awidarto",
  "shareto": "andy.awidarto@gmail.com",
  "doc_id": ObjectId("510417d14325a2be60000000"),
  "doc_filename": "",
  "doc_title": "test document access"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c7d434325a2b80d020000"),
  "event": "request.approval",
  "timestamp": ISODate("2013-02-14T05:59:31.900Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "requester_id": ObjectId("50d433404325a24c04000000"),
  "requester_name": "Andi Karsono Awidarto",
  "shareto": "",
  "approvalby": "andy.awidarto@kickstartlab.com",
  "doc_id": ObjectId("510417d14325a2be60000000"),
  "doc_filename": "",
  "doc_title": "test document access"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c80be4325a2450e000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T06:14:22.213Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "president_director",
  "doc_id": ObjectId("50f991e54325a28a1d000000"),
  "doc_title": "Test auto Project",
  "doc_filename": "",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511c80be4325a2450e010000"),
  "event": "document.share",
  "timestamp": ISODate("2013-02-14T06:14:22.214Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Andi Karsono Awidarto",
  "sharer_id": ObjectId("50d433404325a24c04000000"),
  "sharer_name": "Andi Karsono Awidarto",
  "shareto": "andy.awidarto@gmail.com",
  "doc_id": ObjectId("50f991e54325a28a1d000000"),
  "doc_filename": "",
  "doc_title": "Test auto Project"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511d592d4325a25019000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T21:37:49.680Z"),
  "creator_id": ObjectId("50f3bf264325a2de0c000000"),
  "creator_name": "Andy K. Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "template",
  "doc_id": "511bcd854325a2aa04000000",
  "doc_title": "Invoice Template",
  "doc_filename": "INVOICE.pdf",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511d59a44325a2920c000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T21:39:48.18Z"),
  "creator_id": ObjectId("50f3bf264325a2de0c000000"),
  "creator_name": "Andy K. Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "template",
  "doc_id": "511bcd854325a2aa04000000",
  "doc_title": "Invoice Template",
  "doc_filename": "INVOICE.pdf",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511d5a9b4325a2d323000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T21:43:55.665Z"),
  "creator_id": ObjectId("50f3bf264325a2de0c000000"),
  "creator_name": "Andy K. Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "template",
  "doc_id": "511bcd854325a2aa04000000",
  "doc_title": "Invoice Template",
  "doc_filename": "INVOICE.pdf",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("511d5b084325a26920000000"),
  "event": "document.update",
  "timestamp": ISODate("2013-02-14T21:45:44.162Z"),
  "creator_id": ObjectId("50f3bf264325a2de0c000000"),
  "creator_name": "Andy K. Awidarto",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Andi Karsono Awidarto",
  "sharer_id": "",
  "sharer_name": "",
  "department": "template",
  "doc_id": "511bcd854325a2aa04000000",
  "doc_title": "Invoice Template",
  "doc_filename": "INVOICE.pdf",
  "result": "OK"
});

/** clients records **/

/** content records **/
db.getCollection("content").insert({
  "_id": ObjectId("50f920474325a235f3000000"),
  "always": NumberInt(1),
  "body": "This weekend, I and a few other developers started hacking on +Yeoman to see if we could bake in Express support. Developers have been asking for both back-end support and back-end generators for a while, so we thought we'd see what we could come up with.",
  "category": "help",
  "createdDate": ISODate("2013-01-18T10:13:27.938Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "description": "This weekend, I and a few other developers started hacking on +Yeoman to see if we could bake in Express support. Developers have been asking for both back-end support and back-end generators for a while, so we thought we'd see what we could come up with.",
  "endDate": ISODate("2013-01-31T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-18T10:15:10.885Z"),
  "published": NumberInt(1),
  "section": "help",
  "slug": "Ini-Artikel-Buat-yang-Pengan-Minta-Tolong",
  "startDate": ISODate("2013-01-03T00:00:00.0Z"),
  "tag": "help",
  "tags": [
    "help"
  ],
  "title": "Ini Artikel Buat yang Pengan Minta Tolong"
});
db.getCollection("content").insert({
  "_id": ObjectId("50f919414325a292ef000000"),
  "always": NumberInt(1),
  "body": "Moving between pages has become less common with the advent of longer pages and AJAX loading, but it can still be useful for long repetitive listings or content. You can also create centered pagination by using the class .pagination-centered on its parent div.",
  "category": "help",
  "createdDate": ISODate("2013-01-18T09:43:29.866Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "description": "Moving between pages has become less common with the advent of longer pages and AJAX loading, but it can still be useful for long repetitive listings or content. You can also create centered pagination by using the class .pagination-centered on its parent div.",
  "endDate": ISODate("2013-01-18T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-18T10:42:12.999Z"),
  "published": NumberInt(0),
  "section": "faq",
  "slug": "",
  "startDate": ISODate("2013-01-18T00:00:00.0Z"),
  "tag": "help",
  "tags": [
    "help"
  ],
  "title": "Atikel Satu"
});

/** documents records **/
db.getCollection("documents").insert({
  "_id": ObjectId("50dad69a4325a22701010000"),
  "body": "isi dokumen",
  "createdDate": ISODate("2012-12-26T10:51:06.797Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "penjelasan singkat",
  "docApproval": "",
  "docCategory": "references",
  "docDepartment": "all",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "",
  "docRevisionOf": "",
  "docShare": "",
  "docTag": "",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "title": "Apa Inih"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dadf2b4325a20303000000"),
  "title": "asdsadas",
  "description": "dasfasfsdafas",
  "body": "safasfasfsa",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:27:39.792Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae6d84325a20703020000"),
  "body": "body dokumen",
  "createdDate": ISODate("2012-12-26T12:00:24.412Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "penjelasan",
  "docApproval": "",
  "docCategory": "references",
  "docDepartment": "all",
  "docFiledata": {
    "name": "02 - cobalah mengerti (feat. momo).mp3",
    "type": "audio\/mp3",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpcDA3wu",
    "error": NumberInt(0),
    "size": NumberInt(5001216)
  },
  "docFilename": "02 - cobalah mengerti (feat. momo).mp3",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "",
  "docRevisionOf": "",
  "docShare": "andy@sinaptix.com",
  "docTag": "",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-01T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-31T00:00:00.0Z"),
  "title": "Ini Dokumen "
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dbbfe94325a21f01000000"),
  "title": "test event",
  "description": "event test",
  "body": "sfjsdklgjdfklbjd kfgjdks jgdsjfglksd",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T03:26:33.522Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "1967-mercedes-benz_280-sl_008.jpeg",
  "docFiledata": {
    "name": "1967-mercedes-benz_280-sl_008.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/php2EpyBC",
    "error": NumberInt(0),
    "size": NumberInt(603094)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dbc0824325a28401000000"),
  "title": "another event",
  "description": "blah blah",
  "body": "sadsafdsfdsf",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T03:29:06.423Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dadf474325a20b03000000"),
  "title": "asdsadas",
  "description": "dasfasfsdafas",
  "body": "safasfasfsa",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:28:07.922Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae0ed4325a20703000000"),
  "title": "asdasdas",
  "description": "asdasdas",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:35:09.121Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae1514325a21403000000"),
  "title": "asdasdas",
  "description": "asdasdas",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:36:49.939Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae2094325a21603000000"),
  "title": "asdasdas",
  "description": "asdasdas",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:39:53.362Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "02_qrcode.png"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae2234325a20e03000000"),
  "title": "asdsadas",
  "description": "dasfasfsdafas",
  "body": "safasfasfsa",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:40:19.901Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "03_qrcode.png"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae2544325a21503000000"),
  "title": "asdsadas",
  "description": "dasfasfsdafas",
  "body": "safasfasfsa",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:41:08.646Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "03_qrcode.png"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae2784325a20603000000"),
  "title": "hgfgjfhgjfghj",
  "description": "gdjgfjgfhjgfhj",
  "body": "gjgfjfghjfghjg",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:41:44.353Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "12_qrcode.png"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae30b4325a21403010000"),
  "title": "hgfgjfhgjfghj",
  "description": "gdjgfjgfhjgfhj",
  "body": "gjgfjfghjfghjg",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:44:11.156Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "12_qrcode.png"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae32d4325a20503000000"),
  "title": "hgfgjfhgjfghj",
  "description": "gdjgfjgfhjgfhj",
  "body": "gjgfjfghjfghjg",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:44:45.652Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "12_qrcode.png"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae37e4325a20703010000"),
  "title": "hgfgjfhgjfghj",
  "description": "gdjgfjgfhjgfhj",
  "body": "gjgfjfghjfghjg",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:46:06.967Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae56b4325a22b03000000"),
  "title": "sdsadsad",
  "description": "asdasdas",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:54:19.307Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "3d_Flowchart.gstencil.zip"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dae6164325a22703000000"),
  "title": "sdsadsad",
  "description": "asdasdas",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-26T11:57:10.161Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "3d_Flowchart.gstencil.zip",
  "docFiledata": {
    "name": "3d_Flowchart.gstencil.zip",
    "type": "application\/zip",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpf3kBIr",
    "error": NumberInt(0),
    "size": NumberInt(233046)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dbc0234325a24a01000000"),
  "body": "sfjsdklgjdfklbjd kfgjdks jgdsjfglksd",
  "createdDate": ISODate("2012-12-27T03:27:31.371Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "event test",
  "docApproval": "",
  "docCategory": "references",
  "docDepartment": "all",
  "docFiledata": {
    "name": "1967-mercedes-benz_280-sl_008.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpBmiGlP",
    "error": NumberInt(0),
    "size": NumberInt(603094)
  },
  "docFilename": "1967-mercedes-benz_280-sl_008.jpeg",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "",
  "docRevisionOf": "",
  "docShare": "",
  "docTag": "hello",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "title": "test event"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dbc6014325a24f01010000"),
  "title": "fefsdfsgsd",
  "description": "gdsgdgdfg",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T03:52:33.20Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dbc60e4325a21c01020000"),
  "title": "fefsdfsgsd",
  "description": "gdsgdgdfg",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T03:52:46.584Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dbd3814325a29401000000"),
  "title": "Test Document",
  "description": "sfsdfsdfsdfsd",
  "body": "sdfdsfdsf",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T04:50:09.10Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "1967-mercedes-benz_280-sl_005.jpeg",
  "docFiledata": {
    "name": "1967-mercedes-benz_280-sl_005.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpkD2WeY",
    "error": NumberInt(0),
    "size": NumberInt(459506)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dc22b84325a2fe01000000"),
  "title": "test upload big file",
  "description": "workflows doc",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T10:28:08.44Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dc2d9b4325a2e917000000"),
  "title": "test big file",
  "description": "test big file again",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-27T00:00:00.0Z"),
  "expiryDate": ISODate("2012-12-27T00:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T11:14:35.333Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "Workflows (Rev 1).pdf",
  "docFiledata": {
    "name": "Workflows (Rev 1).pdf",
    "type": "application\/pdf",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/php58X6hu",
    "error": NumberInt(0),
    "size": NumberInt(39989814)
  }
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dc791e4325a22705000000"),
  "body": "",
  "createdDate": ISODate("2012-12-27T16:36:46.378Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "test lagi",
  "docApproval": "",
  "docCategory": "references",
  "docDepartment": "all",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  },
  "docFilename": "",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "",
  "docRevisionOf": "",
  "docShare": "",
  "docTag": "adda",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-26T17:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T17:00:00.0Z"),
  "lastUpdate": ISODate("2012-12-27T18:12:16.969Z"),
  "tags": [
    "adda"
  ],
  "title": "test"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dc794e4325a2c404000000"),
  "body": "",
  "createdDate": ISODate("2012-12-27T16:37:34.164Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "tes",
  "docApproval": "",
  "docCategory": "references",
  "docDepartment": "all",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  },
  "docFilename": "",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "",
  "docRevisionOf": "",
  "docShare": "",
  "docTag": "tag,tag lagi,apa lagi sih ah,halah,heleh,helehe,mimi",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-26T17:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T17:00:00.0Z"),
  "lastUpdate": ISODate("2012-12-28T06:37:14.440Z"),
  "oldTag": "tag,tag lagi,apa lagi sih ah,halah,heleh,helehe",
  "tags": [
    "tag",
    "tag lagi",
    "apa lagi sih ah",
    "halah",
    "heleh",
    "helehe",
    "mimi"
  ],
  "title": "test tag"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dc7c394325a2e504000000"),
  "title": "test tag col",
  "description": "hfahjdgjaksgdhkjasd",
  "body": "",
  "docFormat": "letter",
  "docRevisionOf": "",
  "docDepartment": "all",
  "docCategory": "references",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docTag": "mimo,mimi,mama,hehe,hoho",
  "docShare": "",
  "docApproval": "",
  "effectiveDate": ISODate("2012-12-26T17:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T17:00:00.0Z"),
  "createdDate": ISODate("2012-12-27T16:50:01.349Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "docFilename": "",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  },
  "tags": [
    "mimo",
    "mimi",
    "mama",
    "hehe",
    "hoho"
  ]
});
db.getCollection("documents").insert({
  "_id": ObjectId("50dc7c7d4325a2e204000000"),
  "body": "",
  "createdDate": ISODate("2012-12-27T16:51:09.247Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "hhahahahaha",
  "docApproval": "",
  "docCategory": "references",
  "docDepartment": "outdoor_sales",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  },
  "docFilename": "",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "",
  "docRevisionOf": "",
  "docShare": "andy@sinaptix.com,andy.awidarto@gmail.com,joni@mnemonic.com",
  "docTag": "mimi,mama,momo",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-26T17:00:00.0Z"),
  "expiryDate": ISODate("2012-12-26T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-14T08:08:16.331Z"),
  "sharedIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000")
    },
    {
      "_id": ObjectId("50cacc663004094233a85b5b")
    }
  ],
  "tags": [
    "mimi",
    "mama",
    "momo"
  ],
  "title": "Ini Shared Document"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50eb2d214325a2520d000000"),
  "body": "This can be used to choose previously selected values, such as entering tags for articles or entering email addresses from an address book. Autocomplete can also be used to populate associated information, such as entering a city name and getting the zip code.",
  "createdDate": ISODate("2013-01-07T20:16:33.850Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "Progress ",
  "docApproval": "andy.awidarto@gmail.com",
  "docCategory": "references",
  "docDepartment": "outdoor_sales",
  "docFiledata": {
    "name": "baas-ecosystem.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpiH13Ah",
    "error": NumberInt(0),
    "size": NumberInt(224508)
  },
  "docFilename": "baas-ecosystem.jpeg",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "50dc22b84325a2fe01000000",
  "docRevisionOf": "",
  "docShare": "andy@sinaptix.com",
  "docTag": "valve",
  "docTender": "",
  "effectiveDate": ISODate("2013-01-08T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-13T20:46:11.863Z"),
  "sharedIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000")
    }
  ],
  "tags": [
    "valve"
  ],
  "title": "Progress Project 001"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f699084325a26901000000"),
  "title": "Test Event Doc",
  "docFormat": "letter",
  "docRevisionOf": "50dae6d84325a20703020000",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "docDepartment": "outdoor_sales",
  "docCategory": "correspondences",
  "docProject": "50eb2d214325a2520d000000",
  "docTender": "",
  "docLead": "",
  "docShare": "andy.awidarto@gmail.com,andy.awidarto@kickstartlab.com",
  "docApproval": "andy@paramanusa.com,andy@sinaptix.com",
  "docTag": "valve,kalp",
  "createdDate": ISODate("2013-01-16T12:11:52.152Z"),
  "lastUpdate": ISODate("2013-01-16T12:11:52.152Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "current_incoming",
  "docFiledata": {
    "name": "current_incoming",
    "type": "application\/octet-stream",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpnxzWDk",
    "error": NumberInt(0),
    "size": NumberInt(28606)
  },
  "tags": [
    "valve",
    "kalp"
  ]
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f699414325a27601000000"),
  "access": "general",
  "approvalRequestEmails": [
    ""
  ],
  "approvalRequestIds": [
    
  ],
  "createdDate": ISODate("2013-01-16T12:12:49.26Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApproval": "andy@paramanusa.com,andy@sinaptix.com",
  "docApprovalRequest": "",
  "docCategory": "correspondences",
  "docDepartment": "outdoor_sales",
  "docFiledata": {
    "name": "current_incoming",
    "type": "application\/octet-stream",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpmk4IL1",
    "error": NumberInt(0),
    "size": NumberInt(28606)
  },
  "docFilename": "current_incoming",
  "docFormat": "letter",
  "docLead": "",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "50eb2d214325a2520d000000",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRevisionOf": "50dae6d84325a20703020000",
  "docShare": "andy.awidarto@gmail.com",
  "docTag": "valve,kalp",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-27T08:35:24.517Z"),
  "sharedEmails": [
    "andy.awidarto@gmail.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "id": "50cacc663004094233a85b5b"
    }
  ],
  "tags": [
    "valve",
    "kalp"
  ],
  "title": "Test Event Doc"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f69aad4325a26b01000000"),
  "title": "test share & approval",
  "docFormat": "scan",
  "docRevisionOf": "50dad3364325a26901000000",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "docDepartment": "outdoor_sales",
  "docCategory": "references",
  "docProject": "50eb2d214325a2520d000000",
  "docTender": "",
  "docLead": "",
  "docShare": "andy@sinaptix.com,andy.awidarto@gmail.com",
  "docApproval": "andy.awidarto@kickstartlab.com,andy@paramanusa.com",
  "docTag": "valve,katup",
  "createdDate": ISODate("2013-01-16T12:18:53.188Z"),
  "lastUpdate": ISODate("2013-01-16T12:18:53.188Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "current_incoming",
  "docFiledata": {
    "name": "current_incoming",
    "type": "application\/octet-stream",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/php7fGQRV",
    "error": NumberInt(0),
    "size": NumberInt(28606)
  },
  "tags": [
    "valve",
    "katup"
  ]
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f69ad94325a2e60a000000"),
  "createdDate": ISODate("2013-01-16T12:19:37.316Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApproval": "andy.awidarto@kickstartlab.com,andy@paramanusa.com,andy.awidarto@gmail.com",
  "docCategory": "references",
  "docDepartment": "outdoor_sales",
  "docFiledata": {
    "name": "current_incoming",
    "type": "application\/octet-stream",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/php108HCY",
    "error": NumberInt(0),
    "size": NumberInt(28606)
  },
  "docFilename": "current_incoming",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "50eb2d214325a2520d000000",
  "docRevisionOf": "50dad3364325a26901000000",
  "docShare": "andy@sinaptix.com,andy.awidarto@gmail.com",
  "docTag": "valve,katup",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-16T19:20:44.411Z"),
  "sharedIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000")
    },
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "id": "50cacc663004094233a85b5b"
    }
  ],
  "tags": [
    "valve",
    "katup"
  ],
  "title": "test share & approval"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f69b6e4325a27601020000"),
  "createdDate": ISODate("2013-01-16T12:22:06.299Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApproval": "andy.awidarto@kickstartlab.com",
  "docCategory": "correspondences",
  "docDepartment": "outdoor_sales",
  "docFiledata": {
    "name": "EnhancementModulesJan2013.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpIFkXtb",
    "error": NumberInt(0),
    "size": NumberInt(135681)
  },
  "docFilename": "EnhancementModulesJan2013.pdf",
  "docFormat": "letter",
  "docLead": "",
  "docProject": "50eb2d214325a2520d000000",
  "docRevisionOf": "quotation 2",
  "docShare": "andy@sinaptix.com",
  "docTag": "mama,valve",
  "docTender": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-16T19:45:41.176Z"),
  "sharedIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000")
    }
  ],
  "tags": [
    "mama",
    "valve"
  ],
  "title": "test event lagi deh"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f7975e4325a2d956010000"),
  "title": "Balikpapan Requisition 2",
  "docFormat": "fax",
  "docRevisionOf": "50f795e54325a2a865000000",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "docDepartment": "tender_balikpapan",
  "docCategory": "correspondences",
  "docProject": "",
  "docTender": "",
  "docLead": "",
  "docShare": "andy@sinaptix.com",
  "docApproval": "andy.awidarto@gmail.com",
  "docTag": "operational car",
  "createdDate": ISODate("2013-01-17T06:17:02.835Z"),
  "lastUpdate": ISODate("2013-01-17T06:17:02.835Z"),
  "creatorName": "Andy K. Awidarto",
  "creatorId": "50f3bf264325a2de0c000000",
  "docFilename": "13ccoupe.jpeg",
  "docFiledata": {
    "name": "13ccoupe.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpK3YXrU",
    "error": NumberInt(0),
    "size": NumberInt(4725762)
  },
  "tags": [
    "operational car"
  ]
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f8d7084325a2d6d7000000"),
  "approvalRequestEmails": [
    ""
  ],
  "approvalRequestIds": [
    
  ],
  "createdDate": ISODate("2013-01-18T05:00:56.215Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApproval": "andy.awidarto@kickstartlab.com",
  "docApprovalRequest": "",
  "docCategory": "references",
  "docDepartment": "finance_pusat",
  "docFiledata": {
    "name": "13ccoupe.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpMgfvyx",
    "error": NumberInt(0),
    "size": NumberInt(4725762)
  },
  "docFilename": "13ccoupe.jpeg",
  "docFormat": "letter",
  "docLead": "",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRevisionOf": "50dc22b84325a2fe01000000",
  "docShare": "andy@sinaptix.com",
  "docTag": "mama",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-22T04:31:51.501Z"),
  "sharedEmails": [
    "andy@sinaptix.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000")
    }
  ],
  "tags": [
    "mama"
  ],
  "title": "FA Pusat Satu"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f798754325a25b64000000"),
  "access": "general",
  "approvalRequestEmails": [
    "andy@paramanusa.com",
    "andy@sinaptix.com"
  ],
  "approvalRequestIds": [
    {
      "_id": ObjectId("50f629254325a27d05000000"),
      "fullname": "Andy Karsono"
    },
    {
      "_id": ObjectId("50d433404325a24c04000000"),
      "fullname": "Andi Karsono Awidarto"
    }
  ],
  "approvalResponds": [
    {
      "approval": "no",
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T18:15:57.729Z")
    }
  ],
  "createdDate": ISODate("2013-01-17T06:21:41.521Z"),
  "creatorId": "50f3bf264325a2de0c000000",
  "creatorName": "Andy K. Awidarto",
  "docApproval": "andy.awidarto@gmail.com",
  "docApprovalRequest": "andy@paramanusa.com,andy@sinaptix.com",
  "docCategory": "correspondences",
  "docDepartment": "tender_balikpapan",
  "docFileList": [
    {
      "name": "Parama-MOM-Jan102013.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpBP8ZZ4",
      "error": NumberInt(0),
      "size": NumberInt(247987),
      "uploadTime": ISODate("2013-01-22T04:50:35.705Z")
    }
  ],
  "docFiledata": {
    "name": "Parama-MOM-Jan102013.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpBP8ZZ4",
    "error": NumberInt(0),
    "size": NumberInt(247987),
    "uploadTime": ISODate("2013-01-22T04:50:35.705Z")
  },
  "docFilename": "Parama-MOM-Jan102013.pdf",
  "docFormat": "letter",
  "docLead": "",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRevisionOf": "50f7975e4325a2d956010000",
  "docShare": "andy.awidarto@gmail.com,andy.awidarto@kickstartlab.com",
  "docTag": "operational car",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2013-01-02T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-24T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-27T08:38:10.398Z"),
  "sharedEmails": [
    "andy.awidarto@gmail.com",
    "andy.awidarto@kickstartlab.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "id": "50cacc663004094233a85b5b"
    },
    {
      "_id": ObjectId("50f3bf264325a2de0c000000")
    }
  ],
  "tags": [
    "operational car"
  ],
  "title": "Balikpapan Requisition 2 A"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50fc10754325a26a01000000"),
  "access": "confidential",
  "approvalRequestEmails": [
    "andy.awidarto@kickstartlab.com",
    "andy@sinaptix.com",
    [
      "andy.awidarto@gmail.com"
    ],
    [
      "andy.awidarto@gmail.com"
    ],
    [
      "andy.awidarto@gmail.com"
    ]
  ],
  "approvalRequestIds": [
    {
      "_id": ObjectId("50f3bf264325a2de0c000000"),
      "fullname": "Andy K. Awidarto"
    },
    {
      "_id": ObjectId("50d433404325a24c04000000"),
      "fullname": "Andi Karsono Awidarto"
    },
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "fullname": "Andy Awidarto"
    },
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "fullname": "Andy Awidarto"
    },
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "fullname": "Andy Awidarto"
    }
  ],
  "approvalResponds": [
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50cacc663004094233a85b5b"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T18:34:58.88Z")
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50cacc663004094233a85b5b"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T18:36:28.975Z")
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50cacc663004094233a85b5b"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T18:37:20.436Z")
    },
    {
      "approval": "no",
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:13:38.69Z"),
      "approvalNote": "ini note"
    }
  ],
  "createdDate": ISODate("2013-01-20T15:42:45.572Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApprovalRequest": "andy.awidarto@kickstartlab.com,andy@sinaptix.com",
  "docCategory": "references",
  "docDepartment": "outdoor_sales",
  "docFileList": [
    {
      "name": "Mercedes-Benz_350SL_2D_grn_rvr.jpeg",
      "type": "image\/jpeg",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phphXBJnF",
      "error": NumberInt(0),
      "size": NumberInt(390795)
    },
    {
      "name": "Mercedes-Benz_350SL_2D_grn_rvr.jpeg",
      "type": "image\/jpeg",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phphXBJnF",
      "error": NumberInt(0),
      "size": NumberInt(390795),
      "uploadTime": ISODate("2013-01-20T16:12:49.98Z")
    },
    {
      "name": "c-coupe-01.jpeg",
      "type": "image\/jpeg",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpCFHcZH",
      "error": NumberInt(0),
      "size": NumberInt(4069037),
      "uploadTime": ISODate("2013-01-20T16:15:00.979Z")
    },
    {
      "name": "816520_1503693_5616_3744_11C92_21.jpeg",
      "type": "image\/jpeg",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpplwZV5",
      "error": NumberInt(0),
      "size": NumberInt(2822039),
      "uploadTime": ISODate("2013-01-20T16:15:25.780Z")
    },
    {
      "name": "",
      "type": "",
      "tmp_name": "",
      "error": NumberInt(4),
      "size": NumberInt(0)
    },
    {
      "name": "",
      "type": "",
      "tmp_name": "",
      "error": NumberInt(4),
      "size": NumberInt(0)
    },
    {
      "name": "2012-mercedes-benz_g-350-bluetec-uk_017.jpeg",
      "type": "image\/jpeg",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpE2CGLr",
      "error": NumberInt(0),
      "size": NumberInt(1376411),
      "uploadTime": ISODate("2013-01-20T16:34:47.153Z")
    },
    {
      "name": "SSH Tunnel in 30 Seconds (Mac OSX & Linux) | Drew Morris.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpmiRinC",
      "error": NumberInt(0),
      "size": NumberInt(99152),
      "uploadTime": ISODate("2013-01-20T18:24:54.668Z")
    },
    {
      "name": "HP_ML150_G6_Server.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpQJ0Lsc",
      "error": NumberInt(0),
      "size": NumberInt(1251960),
      "uploadTime": ISODate("2013-01-20T18:26:00.747Z")
    },
    {
      "name": "Parama-MOM-Jan102013.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/php32NAOB",
      "error": NumberInt(0),
      "size": NumberInt(247987),
      "uploadTime": ISODate("2013-01-22T04:51:23.806Z")
    }
  ],
  "docFiledata": {
    "name": "Parama-MOM-Jan102013.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/php32NAOB",
    "error": NumberInt(0),
    "size": NumberInt(247987),
    "uploadTime": ISODate("2013-01-22T04:51:23.806Z")
  },
  "docFilename": "Parama-MOM-Jan102013.pdf",
  "docFormat": "letter",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "P-001",
  "docProjectId": "50e1d3e44325a27b09000000",
  "docProjectTitle": "Project Satu",
  "docRevisionOf": "",
  "docShare": "andy@sinaptix.com",
  "docTag": "tag lagi,valve",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-27T08:35:02.512Z"),
  "sharedEmails": [
    "andy@sinaptix.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000")
    }
  ],
  "tags": [
    "tag lagi",
    "valve"
  ],
  "title": "test event lagi deh"
});
db.getCollection("documents").insert({
  "_id": ObjectId("510417d14325a2be60000000"),
  "access": "general",
  "approvalRequestEmails": [
    "andy.awidarto@kickstartlab.com"
  ],
  "approvalRequestIds": [
    {
      "_id": ObjectId("50f3bf264325a2de0c000000"),
      "fullname": "Andy K. Awidarto"
    }
  ],
  "createdDate": ISODate("2013-01-26T17:52:17.360Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApprovalRequest": "andy.awidarto@kickstartlab.com",
  "docCategory": "references",
  "docDepartment": "subcon",
  "docFileList": [
    {
      "name": "",
      "type": "",
      "tmp_name": "",
      "error": NumberInt(4),
      "size": NumberInt(0),
      "uploadTime": ISODate("2013-01-26T17:52:17.361Z")
    }
  ],
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0),
    "uploadTime": ISODate("2013-01-26T17:52:17.361Z")
  },
  "docFilename": "",
  "docFormat": "letter",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "P-001",
  "docProjectId": "50e1d3e44325a27b09000000",
  "docProjectTitle": "Project Satu",
  "docRevisionOf": "50dae6d84325a20703020000",
  "docShare": "andy.awidarto@gmail.com",
  "docTag": "valve",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-02-14T05:59:31.897Z"),
  "sharedEmails": [
    "andy.awidarto@gmail.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "id": "50cacc663004094233a85b5b"
    }
  ],
  "tags": [
    "valve"
  ],
  "title": "test document access"
});
db.getCollection("documents").insert({
  "_id": ObjectId("511bcd854325a2aa04000000"),
  "access": "general",
  "approvalRequestEmails": [
    ""
  ],
  "approvalRequestIds": [
    
  ],
  "createdDate": ISODate("2013-02-13T17:29:41.174Z"),
  "creatorId": "50f3bf264325a2de0c000000",
  "creatorName": "Andy K. Awidarto",
  "docApprovalRequest": "",
  "docCategory": "references",
  "docDepartment": "template",
  "docFileList": [
    {
      "name": "INVOICE.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpJaGVpE",
      "error": NumberInt(0),
      "size": NumberInt(24180),
      "uploadTime": ISODate("2013-02-13T17:29:41.175Z")
    }
  ],
  "docFiledata": {
    "name": "INVOICE.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpJaGVpE",
    "error": NumberInt(0),
    "size": NumberInt(24180),
    "uploadTime": ISODate("2013-02-13T17:29:41.175Z")
  },
  "docFilename": "INVOICE.pdf",
  "docFormat": "letter",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRevisionOf": "",
  "docShare": "",
  "docTag": "template,invoice,finance",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2013-01-31T17:00:00.0Z"),
  "expiryDate": ISODate("2014-12-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-02-13T17:41:34.619Z"),
  "sharedEmails": [
    ""
  ],
  "sharedIds": [
    
  ],
  "tags": [
    "template",
    "invoice",
    "finance"
  ],
  "title": "Invoice Template"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f991e54325a28a1d000000"),
  "approvalRequestEmails": [
    ""
  ],
  "approvalRequestIds": [
    
  ],
  "createdDate": ISODate("2013-01-18T18:18:13.747Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "docApproval": "",
  "docApprovalRequest": "",
  "docCategory": "references",
  "docDepartment": "president_director",
  "docFiledata": {
    "name": "",
    "type": "",
    "tmp_name": "",
    "error": NumberInt(4),
    "size": NumberInt(0)
  },
  "docFilename": "",
  "docFormat": "letter",
  "docLead": "",
  "docOpportunity": "O-001",
  "docOpportunityId": "50e32dd74325a27009000000",
  "docOpportunityTitle": "Opp one",
  "docProject": "P-002",
  "docProjectId": "50e24af04325a24816000000",
  "docProjectTitle": "Second Project",
  "docRevisionOf": "",
  "docShare": "andy.awidarto@gmail.com",
  "docTag": "valve,katup",
  "docTender": "T-002",
  "docTenderId": "50e327364325a29901000000",
  "docTenderTitle": "Tender One",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-02-14T06:14:22.211Z"),
  "sharedEmails": [
    "andy.awidarto@gmail.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "id": "50cacc663004094233a85b5b"
    }
  ],
  "tags": [
    "valve",
    "katup"
  ],
  "title": "Test auto Project"
});
db.getCollection("documents").insert({
  "_id": ObjectId("50f795e54325a2a865000000"),
  "approvalRequestEmails": [
    "andy@sinaptix.com",
    "andy.awidarto@kickstartlab.com",
    "andy.awidarto@kickstartlab.com",
    "andy.awidarto@kickstartlab.com",
    "andy.awidarto@kickstartlab.com",
    "andy.awidarto@gmail.com"
  ],
  "approvalRequestIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000"),
      "fullname": "Andi Karsono Awidarto"
    },
    {
      "_id": ObjectId("50f3bf264325a2de0c000000"),
      "fullname": "Andy K. Awidarto"
    },
    {
      "_id": ObjectId("50f3bf264325a2de0c000000"),
      "fullname": "Andy K. Awidarto"
    },
    {
      "_id": ObjectId("50f3bf264325a2de0c000000"),
      "fullname": "Andy K. Awidarto"
    },
    {
      "_id": ObjectId("50f3bf264325a2de0c000000"),
      "fullname": "Andy K. Awidarto"
    },
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "fullname": "Andy Awidarto"
    }
  ],
  "approvalResponds": [
    {
      "approval": "yes",
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:21:16.619Z"),
      "approvalNote": "sfsdfsd"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50f3bf264325a2de0c000000"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:25:49.119Z"),
      "approvalNote": "rewrewr"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50f3bf264325a2de0c000000"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:25:49.258Z"),
      "approvalNote": "rewrewr"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50f3bf264325a2de0c000000"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:31:56.757Z"),
      "approvalNote": "rewrewr"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50f3bf264325a2de0c000000"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:31:56.914Z"),
      "approvalNote": "rewrewr"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50f3bf264325a2de0c000000"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:32:19.493Z"),
      "approvalNote": "rewrewr"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50f3bf264325a2de0c000000"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:33:27.248Z"),
      "approvalNote": "rewrewr"
    },
    {
      "approval": "transfer",
      "transferedTo": ObjectId("50cacc663004094233a85b5b"),
      "approverId": "50d433404325a24c04000000",
      "approvalDate": ISODate("2013-02-14T19:35:29.114Z"),
      "approvalNote": "jgjkgjkgk"
    }
  ],
  "createdDate": ISODate("2013-01-17T06:10:45.657Z"),
  "creatorId": "50f3bf264325a2de0c000000",
  "creatorName": "Andy K. Awidarto",
  "docApproval": "andy@sinaptix.com",
  "docApprovalRequest": "andy@sinaptix.com,andy.awidarto@kickstartlab.com,andy.awidarto@gmail.com",
  "docCategory": "correspondences",
  "docDepartment": "tender_balikpapan",
  "docFiledata": {
    "name": "15.jpeg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpaTq4fr",
    "error": NumberInt(0),
    "size": NumberInt(5849098)
  },
  "docFilename": "15.jpeg",
  "docFormat": "letter",
  "docLead": "",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRevisionOf": "",
  "docShare": "andy.awidarto@gmail.com",
  "docTag": "operational car",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2012-12-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-01-30T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-21T08:05:12.548Z"),
  "sharedEmails": [
    "andy.awidarto@gmail.com"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("50cacc663004094233a85b5b"),
      "id": "50cacc663004094233a85b5b"
    }
  ],
  "tags": [
    "operational car"
  ],
  "title": "Balikpapan Requisition"
});

/** employees records **/
db.getCollection("employees").insert({
  "_id": ObjectId("50fceb494325a2fd0a000000"),
  "city": "Jakarta Barat",
  "createdDate": ISODate("2013-01-21T07:16:25.485Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "department": "outdoor_sales",
  "email": "andy.awidarto@kickstartlab.com",
  "employee_jobtitle": "Sith Trainer",
  "fullname": "Andy K. Awidarto",
  "home": "0215841281",
  "lastUpdate": ISODate("2013-01-21T11:13:51.808Z"),
  "mobile": "0878870744012",
  "permissions": {
    "general": false,
    "outdoor_sales": false,
    "indoor_sales": false,
    "project_control": false,
    "bod": false,
    "president_director": false,
    "operations_director": false,
    "finance_hr_director": false,
    "finance_pusat": false,
    "finance_kemang": false,
    "finance_balikpapan": false,
    "sales_kemang": false,
    "sales_balikpapan": false,
    "tender_balikpapan": false,
    "hr_admin": false,
    "warehouse": false,
    "qc": false,
    "clients": false,
    "principal_vendor": false,
    "subcon": false
  },
  "street": "kompleks DKI D3",
  "userId": "50f3bf264325a2de0c000000",
  "zip": "116405"
});

/** invoices records **/

/** messages records **/
db.getCollection("messages").insert({
  "_id": ObjectId("50f70b6f4325a2af2d010000"),
  "from": "andy.awidarto@kickstartlab.com",
  "fromId": "50f3bf264325a2de0c000000",
  "to": "andy@sinaptix.com,andy.awidarto@gmail.com",
  "subject": "Hello all",
  "body": "Hemmlo all",
  "createdDate": ISODate("2013-01-16T20:19:59.313Z"),
  "lastUpdate": ISODate("2013-01-16T20:19:59.313Z"),
  "creatorName": "Andy K. Awidarto",
  "creatorId": "50f3bf264325a2de0c000000",
  "recipients": [
    "andy@sinaptix.com",
    "andy.awidarto@gmail.com"
  ],
  "status": {
    "andy@sinaptix.com": "Delivered",
    "andy.awidarto@gmail.com": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("50f70c9d4325a2ea31000000"),
  "from": "andy.awidarto@kickstartlab.com",
  "fromId": "50f3bf264325a2de0c000000",
  "to": "andy@paramanusa.com",
  "subject": "deeeee",
  "body": "dooooooo",
  "createdDate": ISODate("2013-01-16T20:25:01.468Z"),
  "lastUpdate": ISODate("2013-01-16T20:25:01.468Z"),
  "creatorName": "Andy K. Awidarto",
  "creatorId": "50f3bf264325a2de0c000000",
  "recipients": [
    "andy@paramanusa.com"
  ],
  "status": {
    "andy@paramanusa.com": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("50f7859a4325a2d956000000"),
  "from": "andy@sinaptix.com",
  "fromId": "50d433404325a24c04000000",
  "to": "andy.awidarto@kickstartlab.com",
  "subject": "test kirim aja",
  "body": "Bundles are the heart of the improvements that were made in Laravel 3.0. They are a simple way to group code into convenient \"bundles\". A bundle can have it's own views, configuration, routes, migrations, tasks, and more. A bundle could be everything from a database ORM to a robust authentication system. Modularity of this scope is an important aspect that has driven virtually all design decisions within Laravel. In many ways you can actually think of the application folder as the special default bundle with which Laravel is pre-programmed to load and use.",
  "createdDate": ISODate("2013-01-17T05:01:14.162Z"),
  "lastUpdate": ISODate("2013-01-17T05:01:14.162Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "andy.awidarto@kickstartlab.com"
  ],
  "status": {
    "andy.awidarto@kickstartlab.com": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("511c8c134325a22a14000000"),
  "from": "andy.awidarto@gmail.com",
  "fromId": "50cacc663004094233a85b5b",
  "to": "andy@sinaptix.com",
  "cc": "",
  "bcc": "",
  "subject": "test",
  "body": "messaging internal",
  "createdDate": ISODate("2013-02-14T07:02:43.804Z"),
  "lastUpdate": ISODate("2013-02-14T07:02:43.804Z"),
  "creatorName": "Andy Awidarto",
  "creatorId": "50cacc663004094233a85b5b",
  "recipients": [
    "andy@sinaptix.com"
  ],
  "status": {
    "andy@sinaptix.com": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("511d04de4325a27303000000"),
  "from": "andy@sinaptix.com",
  "fromId": "50d433404325a24c04000000",
  "to": "andy.awidarto@kickstartlab.com",
  "cc": "",
  "bcc": "",
  "subject": "Re: Hello all",
  "body": ">Hemmlo all deh",
  "createdDate": ISODate("2013-02-14T15:38:06.205Z"),
  "lastUpdate": ISODate("2013-02-14T15:38:06.205Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "andy.awidarto@kickstartlab.com"
  ],
  "status": {
    "andy.awidarto@kickstartlab.com": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("511d07a04325a2ac04000000"),
  "from": "andy@sinaptix.com",
  "fromId": "50d433404325a24c04000000",
  "to": "andy@sinaptix.com",
  "cc": "andy.awidarto@gmail.com",
  "bcc": "andy@paramanusa.com",
  "subject": "test bcc",
  "body": "meadjh diuahsdiu adia dihaid aiudhiu asdpiashd iuahs duhasiuda siudh aiusdiopahsd",
  "createdDate": ISODate("2013-02-14T15:49:52.591Z"),
  "lastUpdate": ISODate("2013-02-14T15:49:52.591Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "andy@sinaptix.com"
  ],
  "status": {
    "andy@sinaptix.com": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("511d08474325a24f03000000"),
  "from": "andy@sinaptix.com",
  "fromId": "50d433404325a24c04000000",
  "prevbcc": "andy@paramanusa.com",
  "to": "andy@sinaptix.com",
  "cc": "andy.awidarto@gmail.com",
  "bcc": "andy@sinaptix.com,andy@paramanusa.com",
  "subject": "Re: test bcc",
  "body": "meadjh diuahsdiu adia dihaid aiudhiu asdpiashd iuahs duhasiuda siudh aiusdiopahsd",
  "createdDate": ISODate("2013-02-14T15:52:39.565Z"),
  "lastUpdate": ISODate("2013-02-14T15:52:39.565Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "andy@sinaptix.com"
  ],
  "status": {
    "andy@sinaptix.com": "Delivered"
  }
});

/** opportunities records **/
db.getCollection("opportunities").insert({
  "_id": ObjectId("50e32dd74325a27009000000"),
  "body": "While you can generally design single-page data entry forms for such processes, sometimes it's more effective to guide the user through the process step-by-step, explaining things along the way, and giving her a sense of comfort about her progress. It's generally also comforting to provide a 'review' step at the end, letting the user get an overview of what's about to happen before pressing the big red 'execute' button.",
  "createdDate": ISODate("2013-01-01T18:41:27.894Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "test",
  "estCompleteDate": ISODate("2013-01-18T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-01T18:54:40.896Z"),
  "opportunityApproval": "Andi Karsono Awidarto | andy@sinaptix.com",
  "opportunityClient": "BP Oil",
  "opportunityCurrency": "IDR",
  "opportunityDepartment": "all",
  "opportunityGrossValue": "3000000000",
  "opportunityLead": "",
  "opportunityManager": "Andi Karsono Awidarto | andy@sinaptix.com",
  "opportunityManagerId": "50d433404325a24c04000000",
  "opportunityNetValue": "2750000000",
  "opportunityNumber": "O-001",
  "opportunityShare": "Andy Awidarto | andy.awidarto@gmail.com",
  "opportunityTag": "caliper,valve",
  "opportunityTender": "",
  "startDate": ISODate("2013-01-03T00:00:00.0Z"),
  "tags": [
    "caliper",
    "valve"
  ],
  "title": "Opp one"
});

/** projects records **/
db.getCollection("projects").insert({
  "_id": ObjectId("50e24af04325a24816000000"),
  "body": "Having said that, there are a number of very fair use cases that require a lot of user input, or complex user input, and have potentially nontrivial consequences. For example, customizing and ordering physical goods, scheduling bank transactions, or setting up a complex app (or operating system!) for the first time.",
  "createdDate": ISODate("2013-01-01T02:33:20.316Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "Having said that, there are a number of very fair use cases that require a lot of user input, or complex user input, and have potentially nontrivial consequences. For example, customizing and ordering physical goods, scheduling bank transactions, or setting up a complex app (or operating system!) for the first time.",
  "estCompleteDate": ISODate("2013-01-31T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-18T08:06:21.63Z"),
  "projectApproval": "Andi Karsono Awidarto | andy@sinaptix.com",
  "projectClient": "",
  "projectCurrency": "IDR",
  "projectDepartment": "president_director",
  "projectGrossValue": "120000000",
  "projectLead": "",
  "projectManager": "Andy Karsono",
  "projectManagerEmail": "andy@paramanusa.com",
  "projectManagerId": "50f629254325a27d05000000",
  "projectNetValue": "119000000",
  "projectNumber": "P-002",
  "projectShare": "Andy Awidarto | andy.awidarto@gmail.com",
  "projectTag": "valve",
  "projectTender": "",
  "schedules": [
    {
      "name": "Sprint",
      "desc": "Analysis",
      "values": [
        {
          "from": ISODate("2002-01-22T08:21:20.0Z"),
          "to": ISODate("2005-10-19T08:21:20.0Z"),
          "label": "Requirement Gathering",
          "customClass": "ganttRed"
        }
      ]
    },
    {
      "name": "Running Man",
      "desc": "Scoping",
      "values": [
        {
          "from": ISODate("2007-07-17T08:21:20.0Z"),
          "to": ISODate("2005-12-27T08:21:20.0Z"),
          "label": "Scoping",
          "customClass": "ganttRed"
        }
      ]
    }
  ],
  "startDate": ISODate("2013-01-02T00:00:00.0Z"),
  "tags": [
    "valve"
  ],
  "title": "Second Project"
});
db.getCollection("projects").insert({
  "_id": ObjectId("50fe13ec4325a2df00000000"),
  "body": "",
  "createdDate": ISODate("2013-01-22T04:22:04.687Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "description": "projek ketiga",
  "estCompleteDate": ISODate("2013-02-28T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-22T04:22:45.867Z"),
  "projectApproval": "andy.awidarto@gmail.com",
  "projectClient": "",
  "projectCurrency": "IDR",
  "projectDepartment": "general",
  "projectGrossValue": "120000000",
  "projectLead": "",
  "projectManager": "Andi Karsono Awidarto",
  "projectManagerEmail": "andy@sinaptix.com",
  "projectManagerId": "50d433404325a24c04000000",
  "projectNetValue": "100000000",
  "projectNumber": "P-003",
  "projectShare": "andy@paramanusa.com",
  "projectTag": "valve",
  "projectTender": "",
  "startDate": ISODate("2013-01-01T00:00:00.0Z"),
  "tags": [
    "valve"
  ],
  "title": "Projek Tiga Lagi"
});
db.getCollection("projects").insert({
  "_id": ObjectId("50e1d3e44325a27b09000000"),
  "body": "Having said that, there are a number of very fair use cases that require a lot of user input, or complex user input, and have potentially nontrivial consequences. For example, customizing and ordering physical goods, scheduling bank transactions, or setting up a complex app (or operating system!) for the first time.",
  "createdDate": ISODate("2012-12-31T18:05:24.800Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "Having said that, there are a number of very fair use cases that require a lot of user input, or complex user input, and have potentially nontrivial consequences. For example, customizing and ordering physical goods, scheduling bank transactions, or setting up a complex app (or operating system!) for the first time.",
  "estCompleteDate": ISODate("2013-01-31T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-18T08:26:14.323Z"),
  "projectApproval": "andy@sinaptix.com",
  "projectClient": "maersk oli",
  "projectCurrency": "IDR",
  "projectDepartment": "operations_director",
  "projectGrossValue": "100000",
  "projectLead": "",
  "projectManager": "Andi Karsono Awidarto",
  "projectManagerEmail": "andy@sinaptix.com",
  "projectManagerId": "50d433404325a24c04000000",
  "projectNetValue": "95000",
  "projectNumber": "P-001",
  "projectShare": "andy.awidarto@gmail.com",
  "projectTag": "valve,katup,mimo",
  "projectTender": "",
  "schedules": "",
  "startDate": ISODate("2013-01-02T00:00:00.0Z"),
  "tags": [
    "valve",
    "katup",
    "mimo"
  ],
  "title": "Project Satu"
});

/** quotations records **/

/** tags records **/
db.getCollection("tags").insert({
  "_id": ObjectId("50dc7c39b45af569ed763190"),
  "count": NumberInt(3),
  "tag": "mimo"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dc7c39b45af569ed763191"),
  "count": NumberInt(3),
  "tag": "mimi"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dc7c39b45af569ed763192"),
  "count": NumberInt(4),
  "tag": "mama"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dc7c39b45af569ed763193"),
  "count": NumberInt(2),
  "tag": "hehe"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dc7c39b45af569ed763194"),
  "count": NumberInt(1),
  "tag": "hoho"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dc7c7db45af569ed763195"),
  "count": NumberInt(1),
  "tag": "momo"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dd3e1a043cfda912059a7d"),
  "count": NumberInt(0),
  "tag": "tag"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dd3e1a043cfda912059a7e"),
  "count": NumberInt(1),
  "tag": "tag lagi"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dd3e1a043cfda912059a7f"),
  "count": NumberInt(0),
  "tag": "apa lagi sih ah"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dd3e1a043cfda912059a80"),
  "count": NumberInt(0),
  "tag": "halah"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dd3e1a043cfda912059a81"),
  "count": NumberInt(0),
  "tag": "heleh"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50dd3e1a043cfda912059a82"),
  "count": NumberInt(0),
  "tag": "helehe"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e1d3e4dffa12e8d2138daa"),
  "count": NumberInt(14),
  "tag": "valve"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e3086c583bba203bd0c4a3"),
  "count": NumberInt(4),
  "tag": "katup"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e328c0583bba203bd0c4a5"),
  "count": NumberInt(3),
  "tag": "kalp"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e32dd7583bba203bd0c4a6"),
  "count": NumberInt(1),
  "tag": "caliper"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e332b9583bba203bd0c4a7"),
  "count": NumberInt(1),
  "tag": "test tag"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e33501583bba203bd0c4a8"),
  "count": NumberInt(1),
  "tag": "tag tag"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50f795e54a57a484498fa02e"),
  "count": NumberInt(3),
  "tag": "operational car"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50f91738be813c51647ed1d1"),
  "count": NumberInt(3),
  "tag": "help"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50f91738be813c51647ed1d2"),
  "count": NumberInt(1),
  "tag": "testarticle"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50f991e5be813c51647ed1d3"),
  "count": NumberInt(2),
  "tag": ""
});
db.getCollection("tags").insert({
  "_id": ObjectId("511bd04e19a922a66308b28e"),
  "count": NumberInt(1),
  "tag": "template"
});
db.getCollection("tags").insert({
  "_id": ObjectId("511bd04e19a922a66308b28f"),
  "count": NumberInt(1),
  "tag": "invoice"
});
db.getCollection("tags").insert({
  "_id": ObjectId("511bd04e19a922a66308b290"),
  "count": NumberInt(1),
  "tag": "finance"
});

/** tenders records **/
db.getCollection("tenders").insert({
  "_id": ObjectId("50e327364325a29901000000"),
  "body": "On Android, there hasn't been much documentation around designing wizards (something I hope we address), or great open source examples of wizards (at least as far as I know), so I'd like to offer one such 'reference' example implementation.",
  "createdDate": ISODate("2013-01-01T18:13:10.292Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "description": "tender desc",
  "estCompleteDate": ISODate("2013-01-24T00:00:00.0Z"),
  "lastUpdate": ISODate("2013-01-01T18:19:44.678Z"),
  "prepStartDate": ISODate("1970-01-01T00:00:00.0Z"),
  "submitDate": ISODate("2013-01-26T00:00:00.0Z"),
  "tags": [
    "valve",
    "kalp"
  ],
  "tenderApproval": "Andi Karsono Awidarto | andy@sinaptix.com",
  "tenderClient": "Caltex",
  "tenderCurrency": "IDR",
  "tenderDepartment": "all",
  "tenderGrossValue": "123000000",
  "tenderLead": "",
  "tenderManager": "Andy Awidarto | andy.awidarto@gmail.com",
  "tenderManagerId": "50cacc663004094233a85b5b",
  "tenderNetValue": "120000000",
  "tenderNumber": "T-002",
  "tenderShare": "Andy Awidarto | andy.awidarto@gmail.com",
  "tenderTag": "valve,kalp",
  "tenderTender": "",
  "title": "Tender One"
});

/** users records **/
db.getCollection("users").insert({
  "_id": ObjectId("50f3bf264325a2de0c000000"),
  "city": "",
  "createdDate": ISODate("2013-01-14T08:17:42.194Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "department": "outdoor_sales",
  "email": "andy.awidarto@kickstartlab.com",
  "employee_jobtitle": "Sith Trainer",
  "fullname": "Andy K. Awidarto",
  "home": "",
  "indoor_sales_approve": "1",
  "indoor_sales_create": "1",
  "indoor_sales_delete": "1",
  "indoor_sales_edit": "1",
  "indoor_sales_read": "1",
  "indoor_sales_share": "1",
  "lastUpdate": ISODate("2013-02-03T21:30:26.288Z"),
  "mobile": "",
  "outdoor_sales_read": "1",
  "pass": "$2a$08$PhOHgcLb\/x4urc4sX0wY9.KpXe8bRSf0ArO1IUWg\/Prv4BTT0J.ty",
  "permissions": {
    "general": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "outdoor_sales": {
      "read": "1",
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": "1"
    },
    "indoor_sales": {
      "read": "1",
      "create": "1",
      "edit": "1",
      "delete": "1",
      "approve": "1",
      "share": "1",
      "download": NumberInt(0)
    },
    "project_control": {
      "read": "1",
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "bod": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "president_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "operations_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_hr_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_pusat": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": "1",
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "tender_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": "1",
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "hr_admin": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "warehouse": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "qc": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "clients": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "principal_vendor": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "subcon": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    }
  },
  "project_control_create": "1",
  "project_control_edit": "1",
  "project_control_read": "1",
  "role": "outdoor_sales",
  "sales_balikpapan": "1",
  "street": "",
  "tender_balikpapan": "1",
  "username": "sithlord",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("50d433404325a24c04000000"),
  "bod_set": "1",
  "city": "Jakarta Barat",
  "clients_set": "1",
  "csrf_token": "ncL0961YQ17Z31imzRu5pgZde58jSGn4iPTpu5KP",
  "department": "general",
  "email": "andy@sinaptix.com",
  "employee_department": "RnR",
  "employee_jobtitle": "Dev Manager",
  "finance_pusat_set": "1",
  "fullname": "Andi Karsono Awidarto",
  "general_set": "1",
  "home": "021456789",
  "lastUpdate": ISODate("2013-02-13T17:52:45.415Z"),
  "mobile": "0987654325757578",
  "pass": "$2a$08$HAFe.9pbaW..EwM54lM.ZOTwVfsDAnNZLcikNR5.P.4Nist2xyPei",
  "permissions": {
    "general": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "template": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": "1"
    },
    "outdoor_sales": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "indoor_sales": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "project_control": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "bod": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "president_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "operations_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_hr_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_pusat": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "tender_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "hr_admin": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "warehouse": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "qc": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "clients": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "principal_vendor": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "subcon": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    }
  },
  "repass": "pisangkeju",
  "role": "root",
  "sales_balikpapan_set": "1",
  "street": "Kompleks DKI",
  "username": "masteryoda",
  "zip": "11640"
});
db.getCollection("users").insert({
  "_id": ObjectId("50cacc663004094233a85b5b"),
  "access": [
    "all"
  ],
  "bod_set": "1",
  "city": "",
  "clients_set": "1",
  "department": "subcon",
  "email": "andy.awidarto@gmail.com",
  "employee_department": "RnR",
  "employee_jobtitle": "Dev Manager",
  "finance_balikpapan_set": "1",
  "finance_hr_director_set": "1",
  "finance_kemang_set": "1",
  "finance_pusat_set": "1",
  "fullname": "Andy Awidarto",
  "general_set": "1",
  "home": "",
  "hr_admin_set": "1",
  "id": "50cacc663004094233a85b5b",
  "indoor_sales_set": "1",
  "lastUpdate": ISODate("2013-02-14T05:05:28.701Z"),
  "mobile": "0878870744012",
  "operations_director_set": "1",
  "outdoor_sales_set": "1",
  "pass": "$2a$08$STsZC0kA8Ca2PUF2ddWiRelfO6smKUb07vU6yU3zbNR9P8TcHdFGa",
  "permissions": {
    "general": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "template": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "outdoor_sales": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "indoor_sales": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "project_control": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "bod": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "president_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "operations_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_hr_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_pusat": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "tender_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "hr_admin": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "warehouse": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "qc": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "clients": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "principal_vendor": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "subcon": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    }
  },
  "president_director_set": "1",
  "principal_vendor_set": "1",
  "project_control_set": "1",
  "qc_set": "1",
  "repass": "pisangkeju",
  "role": "subcon",
  "sales_balikpapan_set": "1",
  "sales_kemang_set": "1",
  "street": "Kompleks DKI",
  "subcon_set": "1",
  "username": "admin",
  "warehouse_set": "1",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("50f629254325a27d05000000"),
  "bod": "1",
  "city": "",
  "clients": "1",
  "createdDate": ISODate("2013-01-16T04:14:29.604Z"),
  "creatorId": "50cacc663004094233a85b5b",
  "creatorName": "Andy Awidarto",
  "department": "president_director",
  "email": "andy@paramanusa.com",
  "employee_jobtitle": "Emperor of Universe",
  "finance_balikpapan": "1",
  "finance_hr_director": "1",
  "finance_kemang": "1",
  "finance_pusat": "1",
  "fullname": "Andy Karsono",
  "general": "1",
  "home": "",
  "hr_admin": "1",
  "indoor_sales": "1",
  "lastUpdate": ISODate("2013-02-14T06:16:57.746Z"),
  "mobile": "",
  "operations_director": "1",
  "outdoor_sales": "1",
  "pass": "$2a$08$IVVys8e6CgUvuFb6nYswbug.hwlzzrBwADNWd\/WGK\/GdjaLEAPa0G",
  "permissions": {
    "general": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "template": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "outdoor_sales": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "indoor_sales": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "project_control": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "bod": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "president_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "operations_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_hr_director": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_pusat": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "finance_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_kemang": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "sales_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "tender_balikpapan": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "hr_admin": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "warehouse": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "qc": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "clients": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "principal_vendor": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    },
    "subcon": {
      "read": NumberInt(0),
      "create": NumberInt(0),
      "edit": NumberInt(0),
      "delete": NumberInt(0),
      "approve": NumberInt(0),
      "share": NumberInt(0),
      "download": NumberInt(0)
    }
  },
  "president_director": "1",
  "principal_vendor": "1",
  "project_control": "1",
  "qc": "1",
  "role": "president_director",
  "sales_balikpapan": "1",
  "sales_kemang": "1",
  "street": "",
  "subcon": "1",
  "tender_balikpapan": "1",
  "username": "jabba",
  "warehouse": "1",
  "zip": ""
});

/** vendors records **/

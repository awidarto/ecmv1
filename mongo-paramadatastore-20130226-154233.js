
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

/** downloads indexes **/
db.getCollection("downloads").ensureIndex({
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

/** sequences indexes **/
db.getCollection("sequences").ensureIndex({
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
  "_id": ObjectId("512c83764325a24b11010000"),
  "event": "document.share",
  "timestamp": ISODate("2013-02-26T09:42:14.768Z"),
  "creator_id": ObjectId("5125f6484325a21006000000"),
  "creator_name": "Warehouse",
  "sharer_id": ObjectId("5125f6484325a21006000000"),
  "sharer_name": "Warehouse",
  "shareto": "os@paramanusa.co.id",
  "doc_id": ObjectId("512c83764325a24b11000000"),
  "doc_filename": "Shopfair-Product-Page.jpg",
  "doc_title": "Shopfair Preview"
});
db.getCollection("activities").insert({
  "_id": ObjectId("512c83764325a24b11020000"),
  "event": "document.share",
  "timestamp": ISODate("2013-02-26T09:42:14.770Z"),
  "creator_id": ObjectId("5125f6484325a21006000000"),
  "creator_name": "Warehouse",
  "sharer_id": ObjectId("5125f6484325a21006000000"),
  "sharer_name": "Warehouse",
  "shareto": "hr@paramanusa.co.id",
  "doc_id": ObjectId("512c83764325a24b11000000"),
  "doc_filename": "Shopfair-Product-Page.jpg",
  "doc_title": "Shopfair Preview"
});
db.getCollection("activities").insert({
  "_id": ObjectId("512c83764325a24b11030000"),
  "event": "request.approval",
  "timestamp": ISODate("2013-02-26T09:42:14.771Z"),
  "creator_id": ObjectId("5125f6484325a21006000000"),
  "creator_name": "Warehouse",
  "sharer_id": "",
  "sharer_name": "",
  "requester_id": ObjectId("5125f6484325a21006000000"),
  "requester_name": "Warehouse",
  "shareto": "",
  "approvalby": "os@paramanusa.co.id",
  "doc_id": ObjectId("512c83764325a24b11000000"),
  "doc_filename": "Shopfair-Product-Page.jpg",
  "doc_title": "Shopfair Preview"
});
db.getCollection("activities").insert({
  "_id": ObjectId("512c83764325a24b11040000"),
  "event": "document.create",
  "timestamp": ISODate("2013-02-26T09:42:14.771Z"),
  "creator_id": ObjectId("5125f6484325a21006000000"),
  "creator_name": "Warehouse",
  "updater_id": ObjectId("5125f6484325a21006000000"),
  "updater_name": "Warehouse",
  "sharer_id": "",
  "sharer_name": "",
  "department": "warehouse",
  "doc_id": ObjectId("512c83764325a24b11000000"),
  "doc_title": "Shopfair Preview",
  "doc_filename": "Shopfair-Product-Page.jpg",
  "result": "OK"
});
db.getCollection("activities").insert({
  "_id": ObjectId("512c98cd4325a21b1a010000"),
  "event": "document.create",
  "timestamp": ISODate("2013-02-26T11:13:17.663Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Root User",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Root User",
  "sharer_id": "",
  "sharer_name": "",
  "department": "general",
  "doc_id": ObjectId("512c98cd4325a21b1a000000"),
  "doc_title": "Curriculum Vitae",
  "doc_filename": "HP_ML150_G6_Server.pdf",
  "result": "OK"
});

/** clients records **/
db.getCollection("clients").insert({
  "_id": ObjectId("5129d3b44325a2a71a020000"),
  "clientCompany": "Gunanusa Utama",
  "clientStreet": "benhil",
  "clientCity": "Jakarta",
  "clientZIP": "11640",
  "clientPhone": "62219878968",
  "clientFax": "62217857858",
  "clientEmail": "bisdev@gunanusa.com",
  "clientWebsite": "www.gunanusautama.com"
});
db.getCollection("clients").insert({
  "_id": ObjectId("5129e5824325a2e124000000"),
  "clientCity": "Jakarta",
  "clientCompany": "Caltex Indonesia Inc",
  "clientEmail": "bisdev@gunanusa.com",
  "clientFax": "622178578589",
  "clientPhone": "6221987896848",
  "clientStreet": "Komp DKI Joglo Blok D No 3 RT 01\/04 Joglo Kembangan",
  "clientWebsite": "www.gunanusautama.com",
  "clientZIP": "11640"
});

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
  "_id": ObjectId("512c83764325a24b11000000"),
  "title": "Shopfair Preview",
  "docFormat": "other",
  "docRevisionOf": "",
  "effectiveDate": ISODate("2013-01-31T17:00:00.0Z"),
  "expiryDate": ISODate("2013-02-12T17:00:00.0Z"),
  "access": "general",
  "docShare": "os@paramanusa.co.id,hr@paramanusa.co.id",
  "docApprovalRequest": "os@paramanusa.co.id",
  "docTag": "Shopfair,online shop,design,mock-up,tag itu bisa berapa panjang sih sebenarnya?",
  "docDepartment": "warehouse",
  "docCategory": "progress_report",
  "docOriginalTemplate": "none",
  "docRemarks": "This is a test of uploading a file, creating its container, sharing the file, requesting approval, and tagging with a role as a warehouse department",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "templateName": "",
  "templateNumberStart": "1",
  "createdDate": ISODate("2013-02-26T09:42:14.763Z"),
  "lastUpdate": ISODate("2013-02-26T09:42:14.763Z"),
  "creatorName": "Warehouse",
  "creatorId": "5125f6484325a21006000000",
  "useAsTemplate": "No",
  "sharedEmails": [
    "os@paramanusa.co.id",
    "hr@paramanusa.co.id"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("5125f2994325a2ff01000000")
    },
    {
      "_id": ObjectId("512c76064325a2840a010000")
    }
  ],
  "approvalRequestEmails": [
    "os@paramanusa.co.id"
  ],
  "approvalRequestIds": [
    {
      "_id": ObjectId("5125f2994325a2ff01000000"),
      "fullname": "Outdoor Sales"
    }
  ],
  "docFilename": "Shopfair-Product-Page.jpg",
  "docFiledata": {
    "name": "Shopfair-Product-Page.jpg",
    "type": "image\/jpeg",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpNqrwGt",
    "error": NumberInt(0),
    "size": NumberInt(273229),
    "uploadTime": ISODate("2013-02-26T09:42:14.764Z")
  },
  "docFileList": [
    {
      "name": "Shopfair-Product-Page.jpg",
      "type": "image\/jpeg",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpNqrwGt",
      "error": NumberInt(0),
      "size": NumberInt(273229),
      "uploadTime": ISODate("2013-02-26T09:42:14.764Z")
    }
  ],
  "tags": [
    "Shopfair",
    "online shop",
    "design",
    "mock-up",
    "tag itu bisa berapa panjang sih sebenarnya?"
  ]
});
db.getCollection("documents").insert({
  "_id": ObjectId("512c98cd4325a21b1a000000"),
  "title": "Curriculum Vitae",
  "docFormat": "letter",
  "docRevisionOf": "",
  "effectiveDate": ISODate("2013-02-25T17:00:00.0Z"),
  "expiryDate": ISODate("2013-02-25T17:00:00.0Z"),
  "access": "confidential",
  "docShare": "",
  "docApprovalRequest": "",
  "docTag": "resume,cv,curriculum vitae",
  "docDepartment": "general",
  "docRequestToDepartment": "hr_admin",
  "docCategory": "employee_resume",
  "docOriginalTemplate": "none",
  "docRemarks": "",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docTender": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "docOpportunity": "",
  "docOpportunityId": "",
  "docOpportunityTitle": "",
  "createdDate": ISODate("2013-02-26T11:13:17.660Z"),
  "lastUpdate": ISODate("2013-02-26T11:13:17.660Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "sharedEmails": [
    ""
  ],
  "sharedIds": [
    
  ],
  "approvalRequestEmails": [
    ""
  ],
  "approvalRequestIds": [
    
  ],
  "docFilename": "HP_ML150_G6_Server.pdf",
  "docFiledata": {
    "name": "HP_ML150_G6_Server.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpihwPYg",
    "error": NumberInt(0),
    "size": NumberInt(1251960),
    "uploadTime": ISODate("2013-02-26T11:13:17.661Z")
  },
  "docFileList": [
    {
      "name": "HP_ML150_G6_Server.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpihwPYg",
      "error": NumberInt(0),
      "size": NumberInt(1251960),
      "uploadTime": ISODate("2013-02-26T11:13:17.661Z")
    }
  ],
  "tags": [
    "resume",
    "cv",
    "curriculum vitae"
  ]
});

/** downloads records **/
db.getCollection("downloads").insert({
  "_id": ObjectId("5125d4794325a26706000000"),
  "template": {
    "_id": ObjectId("5125cc614325a28f04000000"),
    "title": "Leave Request Template",
    "docFormat": "letter",
    "docRevisionOf": "",
    "effectiveDate": ISODate("2013-01-31T17:00:00.0Z"),
    "expiryDate": ISODate("2013-02-27T17:00:00.0Z"),
    "access": "confidential",
    "docShare": "",
    "docApprovalRequest": "",
    "docTag": "",
    "docDepartment": "general",
    "docCategory": "references",
    "docProject": "",
    "docProjectId": "",
    "docProjectTitle": "",
    "docTender": "",
    "docTenderId": "",
    "docTenderTitle": "",
    "docOpportunity": "",
    "docOpportunityId": "",
    "docOpportunityTitle": "",
    "useAsTemplate": "Yes",
    "templateName": "leave_request",
    "templateNumberStart": "1",
    "createdDate": ISODate("2013-02-21T07:27:29.670Z"),
    "lastUpdate": ISODate("2013-02-21T07:27:29.670Z"),
    "creatorName": "Andi Karsono Awidarto",
    "creatorId": "50d433404325a24c04000000",
    "sharedEmails": [
      ""
    ],
    "sharedIds": [
      
    ],
    "approvalRequestEmails": [
      ""
    ],
    "approvalRequestIds": [
      
    ],
    "docFilename": "HP_ML150_G6_Server.pdf",
    "docFiledata": {
      "name": "HP_ML150_G6_Server.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpjfo2X5",
      "error": NumberInt(0),
      "size": NumberInt(1251960),
      "uploadTime": ISODate("2013-02-21T07:27:29.672Z")
    },
    "docFileList": [
      {
        "name": "HP_ML150_G6_Server.pdf",
        "type": "application\/pdf",
        "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpjfo2X5",
        "error": NumberInt(0),
        "size": NumberInt(1251960),
        "uploadTime": ISODate("2013-02-21T07:27:29.672Z")
      }
    ],
    "tags": [
      ""
    ]
  },
  "downloader": {
    "_id": {
      "$id": "50d433404325a24c04000000"
    },
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
    "lastUpdate": {
      "sec": NumberInt(1360777965),
      "usec": NumberInt(415000)
    },
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
    "zip": "11640",
    "id": "50d433404325a24c04000000"
  },
  "downloadedfilename": "000004_leave_request",
  "templatename": "leave_request",
  "doc_number": "000004"
});
db.getCollection("downloads").insert({
  "_id": ObjectId("5125d5064325a23709000000"),
  "template": {
    "_id": ObjectId("5125cc614325a28f04000000"),
    "title": "Leave Request Template",
    "docFormat": "letter",
    "docRevisionOf": "",
    "effectiveDate": ISODate("2013-01-31T17:00:00.0Z"),
    "expiryDate": ISODate("2013-02-27T17:00:00.0Z"),
    "access": "confidential",
    "docShare": "",
    "docApprovalRequest": "",
    "docTag": "",
    "docDepartment": "general",
    "docCategory": "references",
    "docProject": "",
    "docProjectId": "",
    "docProjectTitle": "",
    "docTender": "",
    "docTenderId": "",
    "docTenderTitle": "",
    "docOpportunity": "",
    "docOpportunityId": "",
    "docOpportunityTitle": "",
    "useAsTemplate": "Yes",
    "templateName": "leave_request",
    "templateNumberStart": "1",
    "createdDate": ISODate("2013-02-21T07:27:29.670Z"),
    "lastUpdate": ISODate("2013-02-21T07:27:29.670Z"),
    "creatorName": "Andi Karsono Awidarto",
    "creatorId": "50d433404325a24c04000000",
    "sharedEmails": [
      ""
    ],
    "sharedIds": [
      
    ],
    "approvalRequestEmails": [
      ""
    ],
    "approvalRequestIds": [
      
    ],
    "docFilename": "HP_ML150_G6_Server.pdf",
    "docFiledata": {
      "name": "HP_ML150_G6_Server.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpjfo2X5",
      "error": NumberInt(0),
      "size": NumberInt(1251960),
      "uploadTime": ISODate("2013-02-21T07:27:29.672Z")
    },
    "docFileList": [
      {
        "name": "HP_ML150_G6_Server.pdf",
        "type": "application\/pdf",
        "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpjfo2X5",
        "error": NumberInt(0),
        "size": NumberInt(1251960),
        "uploadTime": ISODate("2013-02-21T07:27:29.672Z")
      }
    ],
    "tags": [
      ""
    ]
  },
  "downloader": {
    "_id": {
      "$id": "50d433404325a24c04000000"
    },
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
    "lastUpdate": {
      "sec": NumberInt(1360777965),
      "usec": NumberInt(415000)
    },
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
    "zip": "11640",
    "id": "50d433404325a24c04000000"
  },
  "downloadedfilename": "000005_leave_request.pdf",
  "templatename": "leave_request",
  "doc_number": "000005"
});
db.getCollection("downloads").insert({
  "_id": ObjectId("5125d5564325a26506000000"),
  "template": {
    "_id": ObjectId("5125cc614325a28f04000000"),
    "title": "Leave Request Template",
    "docFormat": "letter",
    "docRevisionOf": "",
    "effectiveDate": ISODate("2013-01-31T17:00:00.0Z"),
    "expiryDate": ISODate("2013-02-27T17:00:00.0Z"),
    "access": "confidential",
    "docShare": "",
    "docApprovalRequest": "",
    "docTag": "",
    "docDepartment": "general",
    "docCategory": "references",
    "docProject": "",
    "docProjectId": "",
    "docProjectTitle": "",
    "docTender": "",
    "docTenderId": "",
    "docTenderTitle": "",
    "docOpportunity": "",
    "docOpportunityId": "",
    "docOpportunityTitle": "",
    "useAsTemplate": "Yes",
    "templateName": "leave_request",
    "templateNumberStart": "1",
    "createdDate": ISODate("2013-02-21T07:27:29.670Z"),
    "lastUpdate": ISODate("2013-02-21T07:27:29.670Z"),
    "creatorName": "Andi Karsono Awidarto",
    "creatorId": "50d433404325a24c04000000",
    "sharedEmails": [
      ""
    ],
    "sharedIds": [
      
    ],
    "approvalRequestEmails": [
      ""
    ],
    "approvalRequestIds": [
      
    ],
    "docFilename": "HP_ML150_G6_Server.pdf",
    "docFiledata": {
      "name": "HP_ML150_G6_Server.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpjfo2X5",
      "error": NumberInt(0),
      "size": NumberInt(1251960),
      "uploadTime": ISODate("2013-02-21T07:27:29.672Z")
    },
    "docFileList": [
      {
        "name": "HP_ML150_G6_Server.pdf",
        "type": "application\/pdf",
        "tmp_name": "\/Applications\/XAMPP\/xamppfiles\/temp\/phpjfo2X5",
        "error": NumberInt(0),
        "size": NumberInt(1251960),
        "uploadTime": ISODate("2013-02-21T07:27:29.672Z")
      }
    ],
    "tags": [
      ""
    ]
  },
  "downloader": {
    "_id": {
      "$id": "50d433404325a24c04000000"
    },
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
    "lastUpdate": {
      "sec": NumberInt(1360777965),
      "usec": NumberInt(415000)
    },
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
    "zip": "11640",
    "id": "50d433404325a24c04000000"
  },
  "downloadedfullfilename": "000006_leave_request.pdf",
  "downloadedfilename": "000006_leave_request",
  "downloadedfileext": "pdf",
  "templatename": "leave_request",
  "doc_number": "000006"
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
db.getCollection("employees").insert({
  "_id": ObjectId("512c99e34325a21b1a020000"),
  "fullname": "Outdoor Sales",
  "email": "os@paramanusa.co.id",
  "userId": "5125f2994325a2ff01000000",
  "employee_jobtitle": "Outdoor Sales",
  "department": "outdoor_sales",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "country": "",
  "createdDate": ISODate("2013-02-26T11:17:55.450Z"),
  "lastUpdate": ISODate("2013-02-26T11:17:55.450Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("employees").insert({
  "_id": ObjectId("512c99f24325a26818000000"),
  "fullname": "Root User",
  "email": "root@paramanusa.co.id",
  "userId": "50d433404325a24c04000000",
  "employee_jobtitle": "Dev Manager",
  "department": "general",
  "mobile": "0987654325757578",
  "home": "021456789",
  "street": "Kompleks DKI",
  "city": "Jakarta Barat",
  "zip": "11640",
  "country": "",
  "createdDate": ISODate("2013-02-26T11:18:10.298Z"),
  "lastUpdate": ISODate("2013-02-26T11:18:10.298Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});

/** invoices records **/

/** messages records **/
db.getCollection("messages").insert({
  "_id": ObjectId("512c79754325a2e70c000000"),
  "from": "root@paramanusa.co.id",
  "fromId": "50d433404325a24c04000000",
  "to": "hr@paramanusa.co.id",
  "cc": "",
  "bcc": "",
  "subject": "test message from root",
  "body": "Hello HR Admin",
  "createdDate": ISODate("2013-02-26T08:59:33.168Z"),
  "lastUpdate": ISODate("2013-02-26T08:59:33.168Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "hr@paramanusa.co.id"
  ],
  "status": {
    "hr@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c79774325a23d0d000000"),
  "from": "hr@paramanusa.co.id",
  "fromId": "512c76064325a2840a010000",
  "to": "root@paramanusa.co.id",
  "cc": "",
  "bcc": "",
  "subject": "Test Message",
  "body": "Test Message",
  "createdDate": ISODate("2013-02-26T08:59:35.269Z"),
  "lastUpdate": ISODate("2013-02-26T08:59:35.269Z"),
  "creatorName": "HR Admin",
  "creatorId": "512c76064325a2840a010000",
  "recipients": [
    "root@paramanusa.co.id"
  ],
  "status": {
    "root@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c79b04325a20c07020000"),
  "from": "root@paramanusa.co.id",
  "fromId": "50d433404325a24c04000000",
  "prevbcc": "",
  "to": "hr@paramanusa.co.id",
  "cc": "",
  "bcc": ",",
  "subject": "Re: Test Message",
  "body": "Test Message",
  "createdDate": ISODate("2013-02-26T09:00:32.201Z"),
  "lastUpdate": ISODate("2013-02-26T09:00:32.201Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "hr@paramanusa.co.id"
  ],
  "status": {
    "hr@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c79e34325a2b40d000000"),
  "from": "hr@paramanusa.co.id",
  "fromId": "512c76064325a2840a010000",
  "to": "root@paramanusa.co.id",
  "cc": "",
  "bcc": "",
  "subject": "Re: Re: Test Message",
  "body": "Re Re Test Message\r\n>Test Message\r\n",
  "createdDate": ISODate("2013-02-26T09:01:23.498Z"),
  "lastUpdate": ISODate("2013-02-26T09:01:23.498Z"),
  "creatorName": "HR Admin",
  "creatorId": "512c76064325a2840a010000",
  "recipients": [
    "root@paramanusa.co.id"
  ],
  "status": {
    "root@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c79e84325a2c401010000"),
  "from": "root@paramanusa.co.id",
  "fromId": "50d433404325a24c04000000",
  "forwardfrom": "hr@paramanusa.co.id",
  "to": "os@paramanusa.co.id",
  "cc": "",
  "bcc": "",
  "subject": "Fwd: Test Message",
  "body": "Forwarded From : hr@paramanusa.co.id\r\n===============================\r\nTest Message",
  "createdDate": ISODate("2013-02-26T09:01:28.379Z"),
  "lastUpdate": ISODate("2013-02-26T09:01:28.379Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "recipients": [
    "os@paramanusa.co.id"
  ],
  "status": {
    "os@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c7ab44325a29e0e000000"),
  "from": "os@paramanusa.co.id",
  "fromId": "5125f2994325a2ff01000000",
  "to": "wh@paramanusa.co.id",
  "cc": "hr@paramanusa.co.id",
  "bcc": "root@paramanusa.co.id",
  "subject": "Test komplit CC BCC",
  "body": "hellowww",
  "createdDate": ISODate("2013-02-26T09:04:52.62Z"),
  "lastUpdate": ISODate("2013-02-26T09:04:52.62Z"),
  "creatorName": "Outdoor Sales",
  "creatorId": "5125f2994325a2ff01000000",
  "recipients": [
    "wh@paramanusa.co.id"
  ],
  "status": {
    "wh@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c7af34325a2c401020000"),
  "from": "wh@paramanusa.co.id",
  "fromId": "5125f6484325a21006000000",
  "prevbcc": "root@paramanusa.co.id",
  "to": "os@paramanusa.co.id",
  "cc": "hr@paramanusa.co.id",
  "bcc": ",root@paramanusa.co.id",
  "subject": "Re: Test komplit CC BCC",
  "body": "Test reply all yeah",
  "createdDate": ISODate("2013-02-26T09:05:55.985Z"),
  "lastUpdate": ISODate("2013-02-26T09:05:55.985Z"),
  "creatorName": "Warehouse",
  "creatorId": "5125f6484325a21006000000",
  "recipients": [
    "os@paramanusa.co.id"
  ],
  "status": {
    "os@paramanusa.co.id": "Delivered"
  }
});
db.getCollection("messages").insert({
  "_id": ObjectId("512c7b5e4325a2890e000000"),
  "from": "wh@paramanusa.co.id",
  "fromId": "5125f6484325a21006000000",
  "prevbcc": "root@paramanusa.co.id",
  "to": "os@paramanusa.co.id",
  "cc": "hr@paramanusa.co.id",
  "bcc": ",root@paramanusa.co.id",
  "subject": "Re: Test komplit CC BCC",
  "body": "Coba jadi gini toh mas:\r\n\r\n\"Original messge >>\r\n[line break]\r\n>hellowww\"",
  "createdDate": ISODate("2013-02-26T09:07:42.376Z"),
  "lastUpdate": ISODate("2013-02-26T09:07:42.376Z"),
  "creatorName": "Warehouse",
  "creatorId": "5125f6484325a21006000000",
  "recipients": [
    "os@paramanusa.co.id"
  ],
  "status": {
    "os@paramanusa.co.id": "Delivered"
  }
});

/** opportunities records **/

/** projects records **/

/** quotations records **/

/** sequences records **/
db.getCollection("sequences").insert({
  "_id": "leave_request",
  "seq": NumberLong(7)
});

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
  "count": NumberInt(19),
  "tag": "valve"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e3086c583bba203bd0c4a3"),
  "count": NumberInt(5),
  "tag": "katup"
});
db.getCollection("tags").insert({
  "_id": ObjectId("50e328c0583bba203bd0c4a5"),
  "count": NumberInt(4),
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
  "count": NumberInt(7),
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
db.getCollection("tags").insert({
  "_id": ObjectId("511daf4533d27002027d7267"),
  "count": NumberInt(2),
  "tag": "leave"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5125ef7e4ec92f536b3c319a"),
  "count": NumberInt(1),
  "tag": "requests"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5125ef7e4ec92f536b3c319b"),
  "count": NumberInt(1),
  "tag": "employee"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c837687c19c0a2f734665"),
  "count": NumberInt(1),
  "tag": "Shopfair"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c837687c19c0a2f734666"),
  "count": NumberInt(1),
  "tag": "online shop"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c837687c19c0a2f734667"),
  "count": NumberInt(1),
  "tag": "design"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c837687c19c0a2f734668"),
  "count": NumberInt(1),
  "tag": "mock-up"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c837687c19c0a2f734669"),
  "count": NumberInt(1),
  "tag": "tag itu bisa berapa panjang sih sebenarnya?"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c98cd87c19c0a2f73466a"),
  "count": NumberInt(1),
  "tag": "resume"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c98cd87c19c0a2f73466b"),
  "count": NumberInt(1),
  "tag": "cv"
});
db.getCollection("tags").insert({
  "_id": ObjectId("512c98cd87c19c0a2f73466c"),
  "count": NumberInt(1),
  "tag": "curriculum vitae"
});

/** tenders records **/
db.getCollection("tenders").insert({
  "_id": ObjectId("51288bd14325a20d02000000"),
  "bidCurrency": "IDR",
  "bidPrice": "300000000",
  "briefScopeDescription": "This is just another tender",
  "clientName": "Caltex",
  "clientTenderNumber": "PQ-090897",
  "closingDate": ISODate("2013-02-28T00:00:00.0Z"),
  "createdDate": ISODate("2013-02-23T09:28:49.389Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "deliveryTerm": "",
  "equivalentBidCurrency": "USD",
  "equivalentBidPrice": "35000",
  "lastUpdate": ISODate("2013-02-24T06:38:20.5Z"),
  "proposedVendor": "",
  "tags": [
    "valve",
    "kalp"
  ],
  "tenderApproval": "",
  "tenderDate": ISODate("2013-02-01T00:00:00.0Z"),
  "tenderDepartment": "general",
  "tenderLead": "",
  "tenderManagerId": "",
  "tenderNumber": "T-0025",
  "tenderPIC": "WHP,AKA",
  "tenderRemark": "",
  "tenderShare": "",
  "tenderStatus": "inprogress",
  "tenderSystem": "",
  "tenderTag": "valve,kalp"
});

/** users records **/
db.getCollection("users").insert({
  "_id": ObjectId("50d433404325a24c04000000"),
  "bod_set": "1",
  "city": "Jakarta Barat",
  "clients_set": "1",
  "csrf_token": "ncL0961YQ17Z31imzRu5pgZde58jSGn4iPTpu5KP",
  "department": "general",
  "email": "root@paramanusa.co.id",
  "employee_department": "RnR",
  "employee_jobtitle": "Dev Manager",
  "finance_pusat_set": "1",
  "fullname": "Root User",
  "general_set": "1",
  "home": "021456789",
  "initial": "ROOT",
  "lastUpdate": ISODate("2013-02-26T08:24:05.281Z"),
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
  "_id": ObjectId("5125f4d64325a2fe01000000"),
  "city": "",
  "createdDate": ISODate("2013-02-21T10:20:06.695Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "department": "indoor_sales",
  "email": "is@paramanusa.co.id",
  "employee_jobtitle": "ISX",
  "fullname": "Indoor Sales",
  "home": "",
  "initial": "ISX",
  "lastUpdate": ISODate("2013-02-26T08:25:09.367Z"),
  "mobile": "",
  "pass": "$2a$08$vH6xrOh02Blc9Cyx5rZ\/SegkMSxz5hX9x43RlIZ.WCWp\/shTp16IS",
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
  "role": "indoor_sales",
  "street": "",
  "username": "indoorsales",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("5125f6484325a21006000000"),
  "city": "",
  "createdDate": ISODate("2013-02-21T10:26:16.924Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "department": "warehouse",
  "email": "wh@paramanusa.co.id",
  "employee_jobtitle": "Warehouse Manager",
  "fullname": "Warehouse",
  "home": "",
  "initial": "WHP",
  "lastUpdate": ISODate("2013-02-26T09:25:14.323Z"),
  "mobile": "",
  "old_initial": "WHP",
  "pass": "$2a$08$SQhcRRu.3E5tOWzZdEoose7CspvjADc3N4pDJhJ5FAkxz.Ufecwt6",
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
      "create": "1",
      "edit": "1",
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
  "role": "warehouse",
  "street": "",
  "username": "warehouse",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("5125f2994325a2ff01000000"),
  "city": "",
  "createdDate": ISODate("2013-02-21T10:10:33.220Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Andi Karsono Awidarto",
  "department": "outdoor_sales",
  "email": "os@paramanusa.co.id",
  "employee_jobtitle": "Outdoor Sales",
  "fullname": "Outdoor Sales",
  "home": "",
  "initial": "OSX",
  "lastUpdate": ISODate("2013-02-26T09:27:41.226Z"),
  "mobile": "",
  "old_initial": "OSX",
  "pass": "$2a$08$eDjKmc1AMZVOJ0036ky1teUjYPeG39HZom7fKg1Pb720rni6x3T36",
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
      "create": "1",
      "edit": "1",
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
  "role": "outdoor_sales",
  "street": "",
  "username": "outdoorsales",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("512c71ed4325a2bd01000000"),
  "email": "bod@paramanusa.co.id",
  "fullname": "Board of Director",
  "pass": "$2a$08$C8xuEKY0Q.dj71RawcvLweF6gG9gy0JW.Q06K36uF157aSpUaBHXq",
  "initial": "BOD",
  "employee_jobtitle": "BOD",
  "department": "bod",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "bod",
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
  "createdDate": ISODate("2013-02-26T08:27:25.309Z"),
  "lastUpdate": ISODate("2013-02-26T08:31:14.797Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c72434325a2840a000000"),
  "email": "presiden@paramanusa.co.id",
  "fullname": "Presiden Director",
  "pass": "$2a$08$FseKANdG1zjH0Y6FSNtkSu\/npiR4Dmeor05c.X05fJ22B9VHOnRva",
  "initial": "PD",
  "employee_jobtitle": "Presiden Director",
  "department": "president_director",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "president_director",
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
  "createdDate": ISODate("2013-02-26T08:28:51.345Z"),
  "lastUpdate": ISODate("2013-02-26T08:29:06.292Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c706e4325a20c07000000"),
  "email": "pc@paramanusa.co.id",
  "fullname": "Project Control",
  "pass": "$2a$08$lFkNfFTJ4JaLIfGRDGzwHukosRWvQR4FBpfZnojjnTAUrEoNdTIgW",
  "initial": "PCX",
  "employee_jobtitle": "Project Control",
  "department": "project_control",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "project_control",
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
  "createdDate": ISODate("2013-02-26T08:21:02.954Z"),
  "lastUpdate": ISODate("2013-02-26T08:21:02.954Z"),
  "creatorName": "Andi Karsono Awidarto",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c72a44325a2fa05000000"),
  "email": "op@paramanusa.co.id",
  "fullname": "Operational Director",
  "pass": "$2a$08$iXhLF9LfvEzU.64GUl2xBu25LfZ6CFxrMrsMS\/k8gNd9X1T6hLfpy",
  "initial": "OP",
  "employee_jobtitle": "Operasional Director",
  "department": "operations_director",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "operations_director",
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
  "createdDate": ISODate("2013-02-26T08:30:28.617Z"),
  "lastUpdate": ISODate("2013-02-26T08:30:28.617Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c732c4325a2bd01010000"),
  "city": "",
  "createdDate": ISODate("2013-02-26T08:32:44.799Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Root User",
  "department": "finance_hr_director",
  "email": "finance@parama.co.id",
  "employee_jobtitle": "Finance",
  "fullname": "Finance",
  "home": "",
  "initial": "FN",
  "lastUpdate": ISODate("2013-02-26T08:35:26.93Z"),
  "mobile": "",
  "old_initial": "FINANCE",
  "pass": "$2a$08$G5ldOAUM3OXgpnpeGQRB3.Thqs\/YKGPdSvWN6guXRahXoOcGrAAyq",
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
  "role": "finance_hr_director",
  "street": "",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("512c73804325a2b401000000"),
  "city": "",
  "createdDate": ISODate("2013-02-26T08:34:08.860Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Root User",
  "department": "finance_pusat",
  "email": "fapusat@paramanusa.co.id",
  "employee_jobtitle": "F&A Pusat",
  "fullname": "F&A Pusat",
  "home": "",
  "initial": "FAP",
  "lastUpdate": ISODate("2013-02-26T08:35:41.89Z"),
  "mobile": "",
  "old_initial": "F&A PUSAT",
  "pass": "$2a$08$e7rFViGip0HHK0asKmxuBeapyMUsJMSQmJaBZCJVbHh770T2dhFZ2",
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
  "role": "finance_pusat",
  "street": "",
  "zip": ""
});
db.getCollection("users").insert({
  "_id": ObjectId("512c73c34325a2360c000000"),
  "email": "fakemang@paramanusa.co.id",
  "fullname": "F&A Kemang",
  "pass": "$2a$08$Vf7LSYBSAA5tjTT3N9A3fe0WQ0nOyK7wbDk\/x7FYGP0f9KlzbXkqO",
  "initial": "FAKM",
  "employee_jobtitle": "F&A Kemang",
  "department": "finance_kemang",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "finance_kemang",
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
  "createdDate": ISODate("2013-02-26T08:35:15.543Z"),
  "lastUpdate": ISODate("2013-02-26T08:35:15.543Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c74394325a2b401010000"),
  "email": "fabp@paramanusa.co.id",
  "fullname": "F&A Balikpapapan",
  "pass": "$2a$08$VzmuAK6qfqzI09hXW3.yjOvNfCj5dHIkzPOL1ryT7cj96E25gWFqe",
  "initial": "FABP",
  "employee_jobtitle": "F&A Balikpapan",
  "department": "finance_balikpapan",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "finance_balikpapan",
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
  "createdDate": ISODate("2013-02-26T08:37:13.84Z"),
  "lastUpdate": ISODate("2013-02-26T08:37:13.84Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c74784325a20c07010000"),
  "email": "smkm@paramanusa.co.id",
  "fullname": "S&M Kemang",
  "pass": "$2a$08$wDKnjkD8u\/rDUkTitF5BdeWYWKiQpFFiVsw8LD38HIXEaPb9Dld0m",
  "initial": "SMKM",
  "employee_jobtitle": "S&M Kemang",
  "department": "sales_kemang",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "sales_kemang",
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
  "createdDate": ISODate("2013-02-26T08:38:16.469Z"),
  "lastUpdate": ISODate("2013-02-26T08:38:16.469Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c74c54325a2c401000000"),
  "email": "smbp@paramanusa.co.id",
  "fullname": "S&M Balikpapan",
  "pass": "$2a$08$VB45ro22BsNhwNIUO\/RoDOd3cEHfkqujpAK8UZrLPBDoyOleg9t12",
  "initial": "SMBP",
  "employee_jobtitle": "S&M Balikpapan",
  "department": "sales_balikpapan",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "sales_balikpapan",
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
  "createdDate": ISODate("2013-02-26T08:39:33.388Z"),
  "lastUpdate": ISODate("2013-02-26T08:39:33.388Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c75c74325a2fa05010000"),
  "email": "btbp@paramanusa.co.id",
  "fullname": "B&T Balikpapan",
  "pass": "$2a$08$DYhfjOR6J5XklvhzLICYCuZfeA4CuKZDAGdC39HGWy3y8AcLxIs6O",
  "initial": "BTBP",
  "employee_jobtitle": "B&T Balikpapan",
  "department": "tender_balikpapan",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "bt_balikpapan",
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
  "createdDate": ISODate("2013-02-26T08:43:51.724Z"),
  "lastUpdate": ISODate("2013-02-26T08:43:51.724Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c76064325a2840a010000"),
  "email": "hr@paramanusa.co.id",
  "fullname": "HR Admin",
  "pass": "$2a$08$oDTS0AqosEUQCVz1YtpCaOMhya\/8BerbMe5NGsWatBxkz18d44Bna",
  "initial": "HRADM",
  "employee_jobtitle": "HR Admin ",
  "department": "hr_admin",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "hr_admin",
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
  "createdDate": ISODate("2013-02-26T08:44:54.87Z"),
  "lastUpdate": ISODate("2013-02-26T08:44:54.87Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c766f4325a27e09000000"),
  "email": "qc@paramanusa.co.id",
  "fullname": "QC ",
  "pass": "$2a$08$LfEWELTW2nEUqEqHd5SlC.xiyqlZpXd9LEKMwEpqQQ4Qke21ERY02",
  "initial": "QC",
  "employee_jobtitle": "QC Paramanusa",
  "department": "qc",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "qc",
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
  "createdDate": ISODate("2013-02-26T08:46:39.580Z"),
  "lastUpdate": ISODate("2013-02-26T08:46:39.580Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c76c04325a2fa05020000"),
  "email": "client@paramanusa.co.id",
  "fullname": "Client",
  "pass": "$2a$08$tnXVdUpAfFvk53ufRe.4M.NN62XViyqNBP5gGO7Ew0oSvgea87bOG",
  "initial": "CLNT",
  "employee_jobtitle": "Client",
  "department": "clients",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "clients",
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
  "createdDate": ISODate("2013-02-26T08:48:00.145Z"),
  "lastUpdate": ISODate("2013-02-26T08:48:00.145Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c77064325a27e09010000"),
  "email": "vendor@paramanusa.co.id",
  "fullname": "Vendor \/ Principal",
  "pass": "$2a$08$UVF86skomq1NegRESuchF.cZKx\/VO9uxETAaJV15XwIKYc8mOnpjC",
  "initial": "VND",
  "employee_jobtitle": "Vendor",
  "department": "principal_vendor",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "principal_vendor",
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
  "createdDate": ISODate("2013-02-26T08:49:10.294Z"),
  "lastUpdate": ISODate("2013-02-26T08:49:10.294Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});
db.getCollection("users").insert({
  "_id": ObjectId("512c77554325a2b401020000"),
  "email": "subcon@paramanusa.co.id",
  "fullname": "Sub-Con \/ 3rd Party",
  "pass": "$2a$08$0D3ewpi4qOgtv7AGU0V2HOs89Mxw2oOA5lnodtMmZ7NWQQbw\/r136",
  "initial": "SUBC",
  "employee_jobtitle": "Sub-Con \/ 3rd Party",
  "department": "subcon",
  "mobile": "",
  "home": "",
  "street": "",
  "city": "",
  "zip": "",
  "role": "subcon",
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
  "createdDate": ISODate("2013-02-26T08:50:29.651Z"),
  "lastUpdate": ISODate("2013-02-26T08:50:29.651Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000"
});

/** vendors records **/
db.getCollection("vendors").insert({
  "_id": ObjectId("5129ec8e4325a25a28000000"),
  "vendorCompany": "Gunanusa Utama",
  "vendorStreet": "benhil",
  "vendorCity": "Jakarta",
  "vendorZIP": "11640",
  "vendorPhone": "62219878968",
  "vendorFax": "62217857858",
  "vendorEmail": "sales@gunanusa.com",
  "vendorWebsite": "www.gunanusautama.com"
});

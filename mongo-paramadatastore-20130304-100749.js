
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

/** expirations indexes **/
db.getCollection("expirations").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** imports indexes **/
db.getCollection("imports").ensureIndex({
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

/** persons indexes **/
db.getCollection("persons").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** progress indexes **/
db.getCollection("progress").ensureIndex({
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
  "_id": ObjectId("513421a10b9b341701000001"),
  "event": "document.share",
  "timestamp": ISODate("2013-03-04T04:22:57.359Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Root User",
  "sharer_id": ObjectId("50d433404325a24c04000000"),
  "sharer_name": "Root User",
  "shareto": "os@paramanusa.co.id",
  "doc_id": ObjectId("513233958ead0ebe01000001"),
  "doc_filename": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
  "doc_title": "Shopfair Preview"
});
db.getCollection("activities").insert({
  "_id": ObjectId("513421a10b9b341701000002"),
  "event": "document.share",
  "timestamp": ISODate("2013-03-04T04:22:57.359Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Root User",
  "sharer_id": ObjectId("50d433404325a24c04000000"),
  "sharer_name": "Root User",
  "shareto": "is@paramanusa.co.id",
  "doc_id": ObjectId("513233958ead0ebe01000001"),
  "doc_filename": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
  "doc_title": "Shopfair Preview"
});
db.getCollection("activities").insert({
  "_id": ObjectId("513421a10b9b341701000003"),
  "event": "document.share",
  "timestamp": ISODate("2013-03-04T04:22:57.360Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Root User",
  "sharer_id": ObjectId("50d433404325a24c04000000"),
  "sharer_name": "Root User",
  "shareto": "wh@paramanusa.co.id",
  "doc_id": ObjectId("513233958ead0ebe01000001"),
  "doc_filename": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
  "doc_title": "Shopfair Preview"
});
db.getCollection("activities").insert({
  "_id": ObjectId("513462740b9b340101000001"),
  "event": "document.expire",
  "timestamp": ISODate("2013-03-04T08:59:32.482Z"),
  "creator_id": ObjectId("50d433404325a24c04000000"),
  "creator_name": "Root User",
  "updater_id": ObjectId("50d433404325a24c04000000"),
  "updater_name": "Root User",
  "sharer_id": "",
  "sharer_name": "",
  "department": "project_control",
  "doc_id": ObjectId("513233958ead0ebe01000001"),
  "doc_title": "Shopfair Preview",
  "doc_filename": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf"
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
  "_id": ObjectId("513233478ead0ebe01000000"),
  "access": "confidential",
  "approvalRequestEmails": [
    "root@paramanusa.co.id",
    "pc@paramanusa.co.id",
    "is@paramanusa.co.id",
    "is@paramanusa.co.id",
    "wh@paramanusa.co.id",
    "wh@paramanusa.co.id"
  ],
  "approvalRequestIds": [
    {
      "_id": ObjectId("50d433404325a24c04000000"),
      "fullname": "Root User"
    },
    {
      "_id": ObjectId("512c706e4325a20c07000000"),
      "fullname": "Project Control"
    },
    {
      "_id": ObjectId("5125f4d64325a2fe01000000"),
      "fullname": "Indoor Sales"
    },
    {
      "_id": ObjectId("5125f6484325a21006000000"),
      "fullname": "Warehouse"
    },
    {
      "_id": ObjectId("5125f6484325a21006000000"),
      "fullname": "Warehouse"
    }
  ],
  "approvalResponds": [
    {
      "approval": "transfer",
      "approverId": "50d433404325a24c04000000",
      "approverEmail": "root@paramanusa.co.id",
      "approverName": "Root User",
      "approvalDate": ISODate("2013-03-03T10:31:07.631Z"),
      "approvalNote": "plse review",
      "approvalTransfer": "wh@paramanusa.co.id"
    },
    {
      "approval": "no",
      "approverId": "50d433404325a24c04000000",
      "approverEmail": "root@paramanusa.co.id",
      "approverName": "Root User",
      "approverInitial": "ROOT",
      "approvalDate": ISODate("2013-03-03T12:55:47.440Z"),
      "approvalNote": "Can not see the document",
      "approvalTransfer": ""
    },
    {
      "approval": "yes",
      "approverId": "50d433404325a24c04000000",
      "approverEmail": "root@paramanusa.co.id",
      "approverName": "Root User",
      "approverInitial": "ROOT",
      "approvalDate": ISODate("2013-03-03T12:57:21.498Z"),
      "approvalNote": "",
      "approvalTransfer": ""
    }
  ],
  "createdDate": ISODate("2013-03-02T17:13:43.574Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Root User",
  "docApprovalRequest": "root@paramanusa.co.id,pc@paramanusa.co.id,is@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id,wh@paramanusa.co.id",
  "docCategory": "references",
  "docDepartment": "project_control",
  "docFileList": [
    {
      "name": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/private\/var\/tmp\/php2RYhE9",
      "error": NumberLong(0),
      "size": NumberLong(93096),
      "uploadTime": ISODate("2013-03-02T17:13:43.575Z")
    }
  ],
  "docFiledata": {
    "name": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/private\/var\/tmp\/php2RYhE9",
    "error": NumberLong(0),
    "size": NumberLong(93096),
    "uploadTime": ISODate("2013-03-02T17:13:43.575Z")
  },
  "docFilename": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
  "docFormat": "letter",
  "docOpportunity": "OP-0023",
  "docOpportunityId": "5131a08b0b9b34b50b000000",
  "docOpportunityTitle": "Gunanusa Utama",
  "docOriginalTemplate": "none",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRemarks": "",
  "docRevisionOf": "",
  "docShare": "os@paramanusa.co.id,is@paramanusa.co.id",
  "docTag": "",
  "docTender": "",
  "docTenderClient": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2013-02-28T17:00:00.0Z"),
  "expiring": NumberLong(0),
  "expiryDate": ISODate("2013-03-29T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-03-03T00:57:00.374Z"),
  "oldTemplateName": "",
  "sharedEmails": [
    "os@paramanusa.co.id",
    "is@paramanusa.co.id"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("5125f4d64325a2fe01000000")
    },
    {
      "_id": ObjectId("5125f2994325a2ff01000000")
    }
  ],
  "tags": [
    ""
  ],
  "templateName": "",
  "templateNumberStart": "1",
  "title": "Shopfair Preview",
  "useAsTemplate": "Yes"
});
db.getCollection("documents").insert({
  "_id": ObjectId("513233958ead0ebe01000001"),
  "access": "general",
  "approvalRequestEmails": [
    ""
  ],
  "approvalRequestIds": [
    
  ],
  "createdDate": ISODate("2013-03-02T17:15:01.886Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Root User",
  "docApprovalRequest": "",
  "docCategory": "references",
  "docDepartment": "project_control",
  "docFileList": [
    {
      "name": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
      "type": "application\/pdf",
      "tmp_name": "\/private\/var\/tmp\/phpApQbgr",
      "error": NumberInt(0),
      "size": NumberInt(93096),
      "uploadTime": ISODate("2013-03-02T17:15:01.887Z")
    }
  ],
  "docFiledata": {
    "name": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
    "type": "application\/pdf",
    "tmp_name": "\/private\/var\/tmp\/phpApQbgr",
    "error": NumberInt(0),
    "size": NumberInt(93096),
    "uploadTime": ISODate("2013-03-02T17:15:01.887Z")
  },
  "docFilename": "KickStartLab Mail - MOM Parama 22 Jan 2013.pdf",
  "docFormat": "letter",
  "docOpportunity": "OP-0023",
  "docOpportunityId": "5131a08b0b9b34b50b000000",
  "docOpportunityTitle": "Gunanusa Utama",
  "docOriginalTemplate": "none",
  "docProject": "",
  "docProjectId": "",
  "docProjectTitle": "",
  "docRemarks": "",
  "docRevisionOf": "",
  "docShare": "os@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id",
  "docTag": "",
  "docTender": "",
  "docTenderClient": "",
  "docTenderId": "",
  "docTenderTitle": "",
  "effectiveDate": ISODate("2013-02-28T17:00:00.0Z"),
  "expiring": NumberInt(1),
  "expiryDate": ISODate("2013-03-05T17:00:00.0Z"),
  "lastUpdate": ISODate("2013-03-04T04:22:57.353Z"),
  "oldTemplateName": "",
  "sharedEmails": [
    "os@paramanusa.co.id",
    "is@paramanusa.co.id",
    "wh@paramanusa.co.id"
  ],
  "sharedIds": [
    {
      "_id": ObjectId("5125f4d64325a2fe01000000")
    },
    {
      "_id": ObjectId("5125f6484325a21006000000")
    },
    {
      "_id": ObjectId("5125f2994325a2ff01000000")
    }
  ],
  "tags": [
    ""
  ],
  "templateName": "",
  "templateNumberStart": "1",
  "title": "Shopfair Preview",
  "useAsTemplate": "Yes"
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

/** expirations records **/
db.getCollection("expirations").insert({
  "_id": ObjectId("513238d797f74353c13bc1b2"),
  "doc_id": ObjectId("513233958ead0ebe01000001"),
  "expiring": {
    "y": NumberInt(0),
    "m": NumberInt(0),
    "d": NumberInt(1),
    "h": NumberInt(0),
    "i": NumberInt(0),
    "s": NumberInt(0),
    "invert": NumberInt(0),
    "days": NumberInt(1)
  }
});

/** imports records **/
db.getCollection("imports").insert({
  "_id": ObjectId("51342b2a0b9b340102000000"),
  "createdDate": ISODate("2013-03-04T05:03:38.692Z"),
  "lastUpdate": ISODate("2013-03-04T05:03:38.692Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "JOB REGISTER.xlsx",
  "docFiledata": {
    "name": "JOB REGISTER.xlsx",
    "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "tmp_name": "\/private\/var\/tmp\/phpCBY1jR",
    "error": NumberInt(0),
    "size": NumberInt(50492),
    "uploadTime": ISODate("2013-03-04T05:03:38.692Z")
  },
  "docFileList": [
    {
      "name": "JOB REGISTER.xlsx",
      "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      "tmp_name": "\/private\/var\/tmp\/phpCBY1jR",
      "error": NumberInt(0),
      "size": NumberInt(50492),
      "uploadTime": ISODate("2013-03-04T05:03:38.692Z")
    }
  ]
});
db.getCollection("imports").insert({
  "_id": ObjectId("51342bb00b9b340102000001"),
  "createdDate": ISODate("2013-03-04T05:05:52.831Z"),
  "lastUpdate": ISODate("2013-03-04T05:05:52.831Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "JOB REGISTER.xlsx",
  "docFiledata": {
    "name": "JOB REGISTER.xlsx",
    "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "tmp_name": "\/private\/var\/tmp\/php9v68pU",
    "error": NumberInt(0),
    "size": NumberInt(50492),
    "uploadTime": ISODate("2013-03-04T05:05:52.831Z")
  },
  "docFileList": [
    {
      "name": "JOB REGISTER.xlsx",
      "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      "tmp_name": "\/private\/var\/tmp\/php9v68pU",
      "error": NumberInt(0),
      "size": NumberInt(50492),
      "uploadTime": ISODate("2013-03-04T05:05:52.831Z")
    }
  ]
});
db.getCollection("imports").insert({
  "_id": ObjectId("51342bd30b9b340102000002"),
  "createdDate": ISODate("2013-03-04T05:06:27.661Z"),
  "lastUpdate": ISODate("2013-03-04T05:06:27.661Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "JOB REGISTER.xlsx",
  "docFiledata": {
    "name": "JOB REGISTER.xlsx",
    "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "tmp_name": "\/private\/var\/tmp\/phptadC3Q",
    "error": NumberInt(0),
    "size": NumberInt(50492),
    "uploadTime": ISODate("2013-03-04T05:06:27.661Z")
  },
  "docFileList": [
    {
      "name": "JOB REGISTER.xlsx",
      "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      "tmp_name": "\/private\/var\/tmp\/phptadC3Q",
      "error": NumberInt(0),
      "size": NumberInt(50492),
      "uploadTime": ISODate("2013-03-04T05:06:27.661Z")
    }
  ]
});
db.getCollection("imports").insert({
  "_id": ObjectId("51342eb70b9b340102000003"),
  "createdDate": ISODate("2013-03-04T05:18:47.482Z"),
  "lastUpdate": ISODate("2013-03-04T05:18:47.482Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "JOB REGISTER.xlsx",
  "docFiledata": {
    "name": "JOB REGISTER.xlsx",
    "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "tmp_name": "\/private\/var\/tmp\/phpUAkkU4",
    "error": NumberInt(0),
    "size": NumberInt(50492),
    "uploadTime": ISODate("2013-03-04T05:18:47.482Z")
  },
  "docFileList": [
    {
      "name": "JOB REGISTER.xlsx",
      "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      "tmp_name": "\/private\/var\/tmp\/phpUAkkU4",
      "error": NumberInt(0),
      "size": NumberInt(50492),
      "uploadTime": ISODate("2013-03-04T05:18:47.482Z")
    }
  ]
});
db.getCollection("imports").insert({
  "_id": ObjectId("51342ee10b9b340102000004"),
  "createdDate": ISODate("2013-03-04T05:19:29.365Z"),
  "lastUpdate": ISODate("2013-03-04T05:19:29.365Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "docFilename": "JOB REGISTER.xlsx",
  "docFiledata": {
    "name": "JOB REGISTER.xlsx",
    "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    "tmp_name": "\/private\/var\/tmp\/phpCkunNF",
    "error": NumberInt(0),
    "size": NumberInt(50492),
    "uploadTime": ISODate("2013-03-04T05:19:29.365Z")
  },
  "docFileList": [
    {
      "name": "JOB REGISTER.xlsx",
      "type": "application\/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      "tmp_name": "\/private\/var\/tmp\/phpCkunNF",
      "error": NumberInt(0),
      "size": NumberInt(50492),
      "uploadTime": ISODate("2013-03-04T05:19:29.365Z")
    }
  ]
});

/** invoices records **/

/** messages records **/
db.getCollection("messages").insert({
  "_id": ObjectId("51324ace8ead0e5d02000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "subject": "Document is expiring",
  "createdDate": ISODate("2013-03-02T18:54:06.803Z"),
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 3 day(s)"
});
db.getCollection("messages").insert({
  "_id": ObjectId("51329f9a0b9b342901000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "subject": "Document is expiring",
  "createdDate": ISODate("2013-03-03T00:55:54.245Z"),
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)"
});
db.getCollection("messages").insert({
  "_id": ObjectId("5132d1220b9b34d901000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "subject": "Document is expiring",
  "createdDate": ISODate("2013-03-03T04:27:14.635Z"),
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)"
});
db.getCollection("messages").insert({
  "_id": ObjectId("513322e80b9b34a002000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "subject": "Document is expiring",
  "createdDate": ISODate("2013-03-03T10:16:08.995Z"),
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)"
});
db.getCollection("messages").insert({
  "_id": ObjectId("5133a8600b9b34cf04000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)",
  "subject": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)",
  "createdDate": ISODate("2013-03-03T19:45:36.410Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("5133df140b9b34fd05000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)",
  "subject": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 2 day(s)",
  "createdDate": ISODate("2013-03-03T23:39:00.245Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("51341eef0b9b34c500000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 1 day(s)",
  "subject": "Shopfair Preview is expiring in 1 day(s)",
  "createdDate": ISODate("2013-03-04T04:11:27.884Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("513461600b9b34eb00000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 1 day(s)",
  "subject": "Shopfair Preview is expiring in 1 day(s)",
  "createdDate": ISODate("2013-03-04T08:54:56.947Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("513462210b9b34b300000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 1 day(s)",
  "subject": "Shopfair Preview is expiring in 1 day(s)",
  "createdDate": ISODate("2013-03-04T08:58:09.56Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("513462400b9b34fb00000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 1 day(s)",
  "subject": "Shopfair Preview is expiring in 1 day(s)",
  "createdDate": ISODate("2013-03-04T08:58:40.196Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("5134624a0b9b34ee00000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 1 day(s)",
  "subject": "Shopfair Preview is expiring in 1 day(s)",
  "createdDate": ISODate("2013-03-04T08:58:50.655Z")
});
db.getCollection("messages").insert({
  "_id": ObjectId("513462740b9b340101000000"),
  "from": "no-reply@paramanusa.co.id",
  "to": "root@paramanusa.co.id",
  "cc": "os@paramanusa.co.id,is@paramanusa.co.id,wh@paramanusa.co.id",
  "body": "<a href=\"http:\/\/localhost\/pnu\/public\/index.php\/document\/type\/project_control\/513233958ead0ebe01000001\">Shopfair Preview<\/a> is expiring in 1 day(s)",
  "subject": "Shopfair Preview is expiring in 1 day(s)",
  "createdDate": ISODate("2013-03-04T08:59:32.482Z")
});

/** opportunities records **/
db.getCollection("opportunities").insert({
  "_id": ObjectId("5131a08b0b9b34b50b000000"),
  "contact_id": "5129d3b44325a2a71a020000",
  "clientCompany": "Gunanusa Utama",
  "clientStreet": "benhil",
  "clientCity": "Jakarta",
  "clientZIP": "11640",
  "clientPhone": "62219878968",
  "clientFax": "62217857858",
  "clientEmail": "bisdev@gunanusa.com",
  "clientWebsite": "www.gunanusautama.com",
  "opportunityDate": ISODate("2013-03-22T00:00:00.0Z"),
  "opportunityNumber": "OP-0023",
  "projectName": "GGG",
  "targetScopeDescription": "Ggggjiojio",
  "closingDate": ISODate("2013-03-29T00:00:00.0Z"),
  "opportunityPIC": "",
  "opportunityStatus": "open",
  "opportunityRemark": "",
  "opportunityApproval": "",
  "opportunityShare": "",
  "opportunityDepartment": "general",
  "opportunityTag": "",
  "createdDate": ISODate("2013-03-02T06:47:39.141Z"),
  "lastUpdate": ISODate("2013-03-02T06:47:39.141Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "tags": [
    ""
  ],
  "opportunityContactPersons": [
    
  ],
  "saveToContact": "No"
});

/** persons records **/

/** progress records **/
db.getCollection("progress").insert({
  "_id": ObjectId("5131a3bd0b9b34e30b000000"),
  "progressInput": "Another test",
  "userId": "50d433404325a24c04000000",
  "userInitial": "ROOT",
  "timestamp": ISODate("2013-03-02T07:01:17.90Z"),
  "opportunityId": "5131a08b0b9b34b50b000000",
  "comments": [
    
  ]
});
db.getCollection("progress").insert({
  "_id": ObjectId("5131a16e0b9b34b50b000001"),
  "comments": [
    {
      "progressid": "5131a16e0b9b34b50b000001",
      "comment": "test lagi",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-02T08:23:19.63Z")
    },
    {
      "progressid": "5131a16e0b9b34b50b000001",
      "comment": "test lagi",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-02T08:23:23.155Z")
    },
    {
      "progressid": "5131a16e0b9b34b50b000001",
      "comment": "Add Another Comment lagi lah",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-02T08:27:27.276Z")
    },
    {
      "progressid": "5131a16e0b9b34b50b000001",
      "comment": "Halah ini pasti bisa",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-02T08:28:25.65Z")
    }
  ],
  "opportunityId": "5131a08b0b9b34b50b000000",
  "progressInput": "First comment on the opportunity",
  "timestamp": ISODate("2013-03-02T06:51:26.559Z"),
  "userId": "50d433404325a24c04000000",
  "userInitial": "ROOT"
});
db.getCollection("progress").insert({
  "_id": ObjectId("51334da10b9b34f103000000"),
  "comments": [
    {
      "progressid": "51334da10b9b34f103000000",
      "comment": "comment to 1st progress",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-03T13:18:35.940Z")
    },
    {
      "progressid": "51334da10b9b34f103000000",
      "comment": "another comment to 1st progress",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-03T13:19:00.430Z")
    }
  ],
  "progressInput": "1st progress",
  "tenderId": "51319f760b9b34990b000002",
  "timestamp": ISODate("2013-03-03T13:18:25.655Z"),
  "userId": "50d433404325a24c04000000",
  "userInitial": "ROOT"
});
db.getCollection("progress").insert({
  "_id": ObjectId("51334dd10b9b341404000000"),
  "progressInput": "2nd progress report",
  "userId": "50d433404325a24c04000000",
  "userInitial": "ROOT",
  "timestamp": ISODate("2013-03-03T13:19:13.165Z"),
  "tenderId": "51319f760b9b34990b000002",
  "comments": [
    
  ]
});
db.getCollection("progress").insert({
  "_id": ObjectId("51334f480b9b342604000000"),
  "progressInput": "project 1st progress",
  "userId": "50d433404325a24c04000000",
  "userInitial": "ROOT",
  "timestamp": ISODate("2013-03-03T13:25:28.213Z"),
  "projectId": "5132ad6a0b9b34a501000000",
  "comments": [
    
  ]
});
db.getCollection("progress").insert({
  "_id": ObjectId("51334f2f0b9b341d04000000"),
  "comments": [
    {
      "progressid": "51334f2f0b9b341d04000000",
      "comment": "commenting first",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-03T13:26:38.951Z")
    },
    {
      "progressid": "51334f2f0b9b341d04000000",
      "comment": "commenting second",
      "commenterName": "Root User",
      "commenterId": "50d433404325a24c04000000",
      "commenterInitial": "ROOT",
      "timestamp": ISODate("2013-03-03T13:26:48.332Z")
    }
  ],
  "progressInput": "peoject first progression",
  "projectId": "5132ad6a0b9b34a501000000",
  "timestamp": ISODate("2013-03-03T13:25:03.389Z"),
  "userId": "50d433404325a24c04000000",
  "userInitial": "ROOT"
});

/** projects records **/
db.getCollection("projects").insert({
  "_id": ObjectId("5132ad6a0b9b34a501000000"),
  "projectNumber": "Project Number One",
  "clientPONumber": "PG-08687587",
  "clientName": "Gunanusa",
  "briefScopeDescription": "Misc Valve",
  "deliveryTerm": "po",
  "effectiveDate": ISODate("2013-03-27T00:00:00.0Z"),
  "dueDate": ISODate("2013-03-30T00:00:00.0Z"),
  "projectVendor": "ccc",
  "projectPIC": "",
  "contractCurrency": "IDR",
  "contractPrice": "150000000",
  "equivalentContractCurrency": "USD",
  "equivalentContractPrice": "15000",
  "projectStatus": "inprogress",
  "projectRemark": "",
  "projectApproval": "",
  "projectShare": "",
  "projectDepartment": "general",
  "projectLead": "",
  "projectTag": "",
  "createdDate": ISODate("2013-03-03T01:54:50.102Z"),
  "lastUpdate": ISODate("2013-03-03T01:54:50.102Z"),
  "creatorName": "Root User",
  "creatorId": "50d433404325a24c04000000",
  "tags": [
    ""
  ]
});

/** quotations records **/

/** sequences records **/

/** tags records **/
db.getCollection("tags").insert({
  "_id": ObjectId("51319cf8aacca5ddde9cd064"),
  "count": NumberInt(5),
  "tag": ""
});
db.getCollection("tags").insert({
  "_id": ObjectId("5132277497f74353c13bc1a1"),
  "count": NumberInt(0),
  "tag": "test document"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5132277497f74353c13bc1a2"),
  "count": NumberInt(0),
  "tag": "february"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5132277497f74353c13bc1a3"),
  "count": NumberInt(0),
  "tag": "tender"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5132277497f74353c13bc1a4"),
  "count": NumberInt(0),
  "tag": "project control"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5132277497f74353c13bc1a5"),
  "count": NumberInt(0),
  "tag": "pc"
});
db.getCollection("tags").insert({
  "_id": ObjectId("5132277497f74353c13bc1a6"),
  "count": NumberInt(0),
  "tag": "is"
});
db.getCollection("tags").insert({
  "_id": ObjectId("51322ef897f74353c13bc1a7"),
  "count": NumberInt(0),
  "tag": "Shopfair"
});
db.getCollection("tags").insert({
  "_id": ObjectId("51322ef897f74353c13bc1a8"),
  "count": NumberInt(0),
  "tag": "online shop"
});
db.getCollection("tags").insert({
  "_id": ObjectId("51322ef897f74353c13bc1a9"),
  "count": NumberInt(0),
  "tag": "design"
});
db.getCollection("tags").insert({
  "_id": ObjectId("51322ef897f74353c13bc1aa"),
  "count": NumberInt(0),
  "tag": "mock-up"
});
db.getCollection("tags").insert({
  "_id": ObjectId("51322ef897f74353c13bc1ab"),
  "count": NumberInt(0),
  "tag": "tag itu bisa berapa panjang sih sebenarnya?"
});

/** tenders records **/
db.getCollection("tenders").insert({
  "_id": ObjectId("51319f760b9b34990b000002"),
  "bidCurrency": "USD",
  "bidPrice": "1000000000",
  "briefScopeDescription": "blah blah",
  "clientName": "Gunanusa",
  "clientTenderNumber": "PQ-090897",
  "closingDate": ISODate("2013-03-30T00:00:00.0Z"),
  "createdDate": ISODate("2013-03-02T06:43:02.698Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Root User",
  "deliveryTerm": "",
  "equivalentBidCurrency": "USD",
  "equivalentBidPrice": "100000",
  "lastUpdate": ISODate("2013-03-03T01:41:45.237Z"),
  "proposedVendor": "",
  "tags": [
    ""
  ],
  "tenderApproval": "",
  "tenderDate": ISODate("2013-03-15T00:00:00.0Z"),
  "tenderDepartment": "general",
  "tenderLead": "",
  "tenderManagerId": "",
  "tenderNumber": "T-00998",
  "tenderPIC": "OSX",
  "tenderRemark": "",
  "tenderShare": "",
  "tenderStatus": "inprogress",
  "tenderSystem": "",
  "tenderTag": ""
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
  "lastUpdate": ISODate("2013-02-26T08:35:26.930Z"),
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
  "createdDate": ISODate("2013-02-26T08:34:07.860Z"),
  "creatorId": "50d433404325a24c04000000",
  "creatorName": "Root User",
  "department": "finance_pusat",
  "email": "fapusat@paramanusa.co.id",
  "employee_jobtitle": "F&A Pusat",
  "fullname": "F&A Pusat",
  "home": "",
  "initial": "FAP",
  "lastUpdate": ISODate("2013-02-26T08:35:41.890Z"),
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
  "createdDate": ISODate("2013-02-26T08:37:13.840Z"),
  "lastUpdate": ISODate("2013-02-26T08:37:13.840Z"),
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
  "createdDate": ISODate("2013-02-26T08:44:54.870Z"),
  "lastUpdate": ISODate("2013-02-26T08:44:54.870Z"),
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

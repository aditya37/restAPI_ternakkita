const multer = require('multer')

const productStorage = multer.diskStorage({
    destination:function(req,file,cb){
        cb(null,'./products-storage')
    },filename:function(req,file,cb){
        cb(null,new Date().toISOString()+file.originalname);
    }
})

const filterFileType = (req,file,cb)=>{
    if(file.mimetype == 'image/jpg' || file.mimetype == 'image/png'){
        cb(null,true)
    }else{
        cb(null,false)
    }
}

const productUpload  = multer({
    storage: productStorage,
    limits:{fileSize: 1024 * 1024 * 5},
    fileFilter:filterFileType
})

const customerUpload = multer({})

module.exports = {
    productUpload,
    customerUpload
}
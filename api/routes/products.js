const express = require('express')
const router  = express.Router()
const {
    productUpload,
    customerUpload
} = require('../utils/fileUpload')

router.post('/',productUpload.single("productImage"),(req,res,next)=>{
    const upload = req.file.path
    
    res.status(201).json({
        message:'Berhasil Hore',
        status:'1',
        meta_status:{method:req.method,code:res.statusCode},
        results:{
            key1:upload,
            someData:{key2:'value2'},
        }
    })
    
})

module.exports = router
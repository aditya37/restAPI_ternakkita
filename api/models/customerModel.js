const mongoose = require('mongoose')

const customerSchema = mongoose.Schema({

    _id: mongoose.Types.ObjectId,
    username:{
        required: true,
        type: String
    },
    password:{
       required: true,
       type: String
    },
    email:{
        required: true,
        type:String
    },
    fcmToken:{
        required: true,
        type: String
    }
},{versionKey: false})

module.exports = mongoose.model("customers",customerSchema)
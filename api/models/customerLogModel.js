const mongoose = require('mongoose')

const customerLogSchema = mongoose.Schema({
    _id: mongoose.Types.ObjectId,
    ipAddress:{
        type:String,
        required:true
    },
    customerDevices:[{
        deviceName:{
            type:String,
            required:true
        },
        deviceVersion:{
            type:String,
            required:true
        }
    }],
    dateLogin:{
        type:Date,
        required:true
    },
    idCustomer:{
        type:mongoose.Schema.Types.ObjectId,
        ref:"customers"
    },
},{versionKey: false})

module.exports = mongoose.model("customerLogs",customerLogSchema)
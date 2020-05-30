import mongoose from 'mongoose'
import bcrypt from 'bcrypt'

import dotenv  from 'dotenv'
dotenv.config()

import jwt from 'jsonwebtoken'

import customerSchema from '../models/customerModel'
import customerLogSchema from '../models/customerLogModel'

import {resOk,resError} from '../utils/respone'

exports.registerCustomer = async (req,res,next) =>{
    var  {username,password,email,fcmToken} = req.body
    
    try {
        var findUser = await customerSchema.find({
            $or:[
                {username:username},{email:email}
            ]
        })
        if(findUser.length >= 1){
            return resError(409,'409',"Username already rgistered. Try another username","Username already stored in database",res)
        }
        
        bcrypt.hash(password,10,async (err,hash)=>{
            if(err){
                resError(500,"500","Failed to register your account. please try again",err,res)
            }else{
                const _customerSchema = new customerSchema({
                    _id:new mongoose.Types.ObjectId(),
                    username:username,
                    password:hash,
                    email:email,
                    fcmToken:fcmToken
                })
                let save = await _customerSchema.save()
                if(save){
                    resOk(201,{idCustomer:save._id},res)
                }
                
            }
        }) 
    } catch (error) {
        console.log(error)
        return resError(500,"500","Sorry Ya gaes",error.message,res)
    }
    
}

exports.loginCustomer    = async (req,res,next) =>{
    const {username,password,email} = req.body
    
    try {
        const _loginCustomer = await customerSchema.find({
            $or:[
                {"username":username},{"email":email}
            ]
        })
        if(_loginCustomer < 1){
           return resError(404,'404',"Username or email not registered","Username or email not found in database",res)
        }

        bcrypt.compare(password,_loginCustomer[0].password,(err,result)=>{
            if(err){return resOk(401,"auth Failed"+err,res)}
            
            if(result){
                const generatedJwtToken = jwt.sign({
                    idCustomer:_loginCustomer._id,
                    username:_loginCustomer.username,
                    email:_loginCustomer.email
                },process.env.JWT_KEY,{expiresIn:"1h"})

                const resultData ={
                    idCustomer:_loginCustomer[0]._id,
                    username:_loginCustomer[0].username,
                    fcmToken:_loginCustomer[0].fcmToken,
                    token:generatedJwtToken
                }
                resOk(200,resultData,res)
            }else{
                resOk(401,"Gagal",res)
            }
        })
    } catch (error) {
        console.log(error)
        return resError(500,"500","Ooops!!,Sorry",error.message,res)
    }
}

exports.saveLog          = async (req,res,next)=>{
    const {idCustomer,customerDevices,ipAddress,dateLogin} = req.body
    
    try {
        const _customerLogSchema = new customerLogSchema({
            _id: new mongoose.Types.ObjectId(),
            ipAddress:ipAddress,
            customerDevices:customerDevices,
            dateLogin:dateLogin,
            idCustomer:idCustomer
        })
        console.log(customerLogSchema.length)
        let saveCustomerLog = await _customerLogSchema.save()
        
        if(saveCustomerLog){
            resOk(201,"Success, save customer logs",res)
        }else{
            res.status(200).json({gagal})
        }
    } catch (error) {
        console.log(error)
        next()
    }
}
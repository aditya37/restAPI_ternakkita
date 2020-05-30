const jwt = require('jsonwebtoken')
const dotenv = require('dotenv').config()
const {resOk,resError} = require('../utils/respone')

module.exports = (req,res,next)=>{
    try{
        const token = req.headers.authorization.split(" ")[1];
        const decoded = jwt.verify(token, process.env.JWT_KEY);
        req.userData = decoded;
        next();
    }catch(error){
        return resError(401,"401","Sorry Authorization Error,"+error.message,error.message,res)
    }
};
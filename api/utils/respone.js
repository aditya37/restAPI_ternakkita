exports.resOk = function(rescode,value,res){
      res.status(rescode).json({
        status:'1',
        results:value
    })
}

exports.resError = function(rescode,errorCode,userMessage,internalMessage,res){
    res.status(rescode).json({
        status:'0',
        errorCode:errorCode,
        errors:{
            userMessage:userMessage,
            internalMessage:internalMessage,
            moreInfo:'Your URL Documentation'
        }
    })
}

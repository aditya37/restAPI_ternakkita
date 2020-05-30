// Dotenv
import dotenv from 'dotenv'
dotenv.config()

// Express js
import express from 'express'
var app     = express()

// Create server run on Port 1309
import http from 'http'
var createServer= http.createServer(app)

// Declare Route
import productRoute from './api/routes/products'
import authRoute    from './api/routes/auth'

// Loging Morgan
import log from 'morgan'

// mongodb
import database from 'mongoose'

// show log from morgan to console.log(value)
app.use(log('combined'))

// redirect ke halaman index 
app.use('/',express.static('public'))

// Body Parser
import bodyParser from 'body-parser'
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended: true}))

// connect to database
database.connect(process.env.MONGODB_URL,{useNewUrlParser :true,useUnifiedTopology:true})
database.connection.on('error', err =>{console.log('unable to connect to database')})

app.use('/v1/products',productRoute)
app.use('/v1/auth',authRoute)


// error handling
app.use((req,res,next )=> {
    const error = new Error('Page Not Found')
    error.status == 404
    next(error)
})

// show error meassage to user
app.use((error,req,res,next) => {
    res.status(error.status || 500)
    res.json({
        message:"Not found",
        status:'1',
        request:{method:req.method,code:res.statusCode},
        errors:{
            userMessage:"Sorry,Page not found",
            internalMessage:"Page not found",
            moreInfo:"http://127.0.0.1:1309/documentation/"
        }
    })
})

createServer.listen(process.env.PORT,()=>{
    console.log("Server run on port ",process.env.PORT)
})

module.exports = app;

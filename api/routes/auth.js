const express = require('express')
const router  = express.Router()

const controllerAuth = require('../controllers/controllerAuth')
const jwtAuth = require('../utils/jwtAuth')

router.post('/',controllerAuth.loginCustomer)
router.post('/register',controllerAuth.registerCustomer)
router.post('/log',jwtAuth,controllerAuth.saveLog)

router.get('/test',jwtAuth,(req,res,next)=>{
    res.status(200).json({run:"run"})
})

module.exports = router
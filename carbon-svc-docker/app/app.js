const express = require('express')
const carbone = require('carbone')
const multer = require('multer')

const storage = multer.memoryStorage()

//const upload = multer({ storage: storage })
const upload = multer({ dest:'uploads/' });

const fs = require('fs');

const app = express()
const port = 3000

app.get('/', (req, res) => {
	res.send('Carbone renderer...')
})

app.post('/CV4U/:pdffilename', upload.single('myFile'), function(req, res, next) {
	const uploadedfile = req.file.path ;
	var data ={};
	var options = {
		convertTo    : 'pdf'
	};
	carbone.render(req.file.path, data, options, function(err, result){
		if (err) {
			return console.log(err);
		}
		// write the result
		// var outputFilename='/tmp/output.pdf';
		// fs.writeFileSync(outputFilename, result);
		res.setHeader('Content-Type', 'application/pdf');
		res.setHeader('Content-Disposition',  'attachment; filename="' + req.params.pdffilename + '"');
		res.send(result)
	});


});


app.listen(port, () => {
	console.log(`Example app listening on port ${port}`)
})

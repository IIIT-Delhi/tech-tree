//declaration of libraries
var http=require('http');
var fs = require('fs');
var url=require('url');

//Create a http server and then listen on port 8080
http.createServer(function(req, res){
        //read the requested file so, if the address is server:8080/demo.html, then open html file
  fs.readFile("."+req.url, function(err, data){
    var str=req.url;

    //check the file type
    if(str.search(".js")!=-1){
            //if JS, then write HTTP header as JS
      res.writeHead(200, {'Content-Type': 'text/javascript'});
    }else if (str.search(".html")!=-1) {
            // if HTML, write content header as html
      res.writeHead(200, {'Content-Type': 'text/html'});
    }
    console.log(data);

    //send the data
    res.write(data);
    res.end();
  });
    }
  ).listen(8080);
window.onload=function(){
	//opener代表父窗口 
	var oFaceImg = opener.document.getElementById('faceimg');
	
	var tanchuang = document.getElementById('face');
	var aImgs = tanchuang.getElementsByTagName('img');
	for(var i=0;i<aImgs.length;i++){
		 aImgs[i].onclick=function(){
		 	oFaceImg.src = this.src;
		 }
	}
	 
}

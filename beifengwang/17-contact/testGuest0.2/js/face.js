window.onload=function(){
	var oFaceImg = document.getElementById('faceimg');
	var oCode = document.getElementById('code');
	oFaceImg.onclick=function(){
		window.open('face.php','face','width=400,height=400,top=0,left=0,scrollbars=1')
	}
	oCode.onclick = function(){
		this.src = 'code.php?mt='+Math.random();
	}
}

function res(){
	
	let score = 0;

	let a1 = document.getElementById('v11');
	let b1 = document.getElementById('v12');
    let c1 = document.getElementById('v13');
    let d1 = document.getElementById('v14');


	let a2 = document.getElementById('v21');
	let b2 = document.getElementById('v22');
    let c2 = document.getElementById('v23');
    let d2 = document.getElementById('v24');

	let a3 = document.getElementById('v31');
	let b3 = document.getElementById('v32');
    let c3 = document.getElementById('v33');
	let d3 = document.getElementById('v34');
	
	let a4 = document.getElementById('v41');
	let b4 = document.getElementById('v42');
    let c4 = document.getElementById('v43');
    let d4 = document.getElementById('v44');


	if(d1.checked == true ){
		score+=1;
	}
	if(b2.checked == true ){
		score+=1;
	}
	if(c3.checked == true ){
		score+=1;
	}
	if(d4.checked == true ){
		score+=1;
	}

	document.getElementById('res').innerHTML = "You've scored " + score + " points";


}
document.addEventListener('DOMContentLoaded',function(){
	const clickButton=document.getElementById('ClickButton');
	const moneyDisplay=document.getElementById('MoneyDisplay');

	clickButton.addEventListener('click',function(){
		const xhr=new XMLHttpRequest();
		xhr.open('POST','money.php',true);
		xhr.setRequestHeader("Content-type","application/x-www-form-urlencode");
		xhr.onreadystatechange=function(){
			if (xhr.readyState === 4 && xhr.status === 200) {
				const moneyAmount=parseInt(xhr.responseText);
				moneyDisplay.textContent=moneyAmount;
			}
		};
		xhr.send("click=true");
	})
});
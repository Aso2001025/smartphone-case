

let num = 0;

function change(num) {
    document.getElementById("image").src=images[num];
    document.getElementById("num").innerHTML=nums[num]+'個';
}

function goBack(){
    if (num == 0) {
        num = images.length-1;
    }
    else {
        num --;
    }
    change(num);
}

function goForward(){
    if (num == images.length-1) {
        num = 0;
    }
    else {
        num ++;
    }
    change(num);
}
let arr = [
    {cd:"0", label:"▼支払い方法"},
    {cd:"1", label:"クレジットカード"},
    {cd:"2", label:"コンビニ後払い"},
];

let convenience=[
    {cd:"0", label:"▼コンビニ選択"},
    {cd:"1", label:"セブンイレブン"},
    {cd:"2", label:"ファミリーマート"},
    {cd:"3", label: "ローソン"},
];




//都府県コンボの生成
window.onload=function(){
    for(let i=0;i<arr.length;i++){
        let op = document.createElement("option");
        op.value = arr[i].cd;
        op.text = arr[i].label;
        document.getElementById("pay").appendChild(op);
    }
}

//都府県が選択された時に呼び出される処理
function select(obj){
    let targetArr;
    if(obj.value == "1"){
        targetArr = arr_credit;
    }else if(obj.value == "2"){
        targetArr = convenience;
    }else{
        targetArr = new Array();
    }
    let selObj = document.getElementById('credit');
    while(selObj.lastChild){
        selObj.removeChild(selObj.lastChild);
    }
    for(let i=0;i<targetArr.length;i++){
        let op = document.createElement("option");
        op.value = targetArr[i].cd;
        op.text = targetArr[i].label;
        selObj.appendChild(op);
    }
}

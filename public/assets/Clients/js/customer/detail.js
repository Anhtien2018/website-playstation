   const quandetail=document.querySelector('#quandetail');
function highdetail() {
    let curent=parseInt(quandetail.value);
    quandetail.value=curent+1;
}
function lowdetail() {
    let curent=parseInt(quandetail.value);
    quandetail.value=curent-1;
}
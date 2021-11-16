function goBack(){
    window.history.back('./index.php?page_layout=qlsanpham')
}
var  text=document.getElementsByClassName('menu-text');
        text.onclick(function(){
            text.style.backgroundColor="red";
        })


var tb = null;
var tipomt=null
var pec=null
var mt=null;
var rows = null;
var actualtipo="td"
var actualpec="td"
var actualmt=""
function pecchanged(){
    actualpec=pec.value;
    search()      
}   

function tipochanged(){
    actualtipo=tipomt.value;   
    search()    
}
function mtchanged(){
    actualmt=mt.value;   
    search()    
}

function search() {
    for (i = 2; i < rows.length; i++) {
        let tipo = rows[i].getElementsByTagName("td")[2].getAttribute("data-tipo")
        let pecmt = rows[i].getElementsByTagName("td")[0].getAttribute("data-pec")
        let name=rows[i].getElementsByTagName("td")[1].getAttribute("data-mt")
        if ((tipo==actualtipo || actualtipo=="td") && (pecmt.includes(actualpec)|| actualpec=="td") && (name.includes(actualmt)||actualmt=="")) {
            rows[i].style.display = "";
          } 
          else {
            rows[i].style.display = "none";
          }
        } 
}



document.addEventListener("DOMContentLoaded",() => {
    tb=document.getElementById("table")
    tipomt=document.getElementById("tipo")
    pec=document.getElementById("pec")
    rows = tb.rows;
    mt=document.getElementById("mt")

    

})
function errado(){
    alert("Senha ou Usuário errado!")
}
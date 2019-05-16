function precio () {
  var costos, utilidades, iva;
  var mensaje = "El Precio de Venta del Producto es: $"
  var msn_ganancia ="La Gananancia de venta es: $" 
  
  costo=document.getElementById("costos").value;
  utilidad=document.getElementById("utilidades").value;
  iva=document.getElementById("impuesto").value;

  cal_valor = costo * utilidad / 100 + costo * iva /100 + costo * 1;
  ganancia = costo * utilidad / 100; 
  
  document.getElementById("cal_valor").value = mensaje + cal_valor;
  document.getElementById("ganancia").value = msn_ganancia + ganancia;
}

function calcular_res(){
    
    var a = document.f1.b1.value;
    var b = document.f1.b2.value;
    var x = document.f1.b3.value;
    var r = document.f1.c.value;
    r1= a.toString()+b.toString();
    r=parseFloat(r1)*parseFloat(x);
   document.f1.c.value=r;

}
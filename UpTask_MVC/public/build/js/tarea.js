!function(){function e(e,t,a){document.querySelector(".alerta")&&n.remove();const n=document.createElement("DIV");n.classList.add("alerta",t),n.textContent=e,a.parentElement.insertBefore(n,a.nextElementSibling),setTimeout((()=>{n.remove()}),3e3)}document.querySelector("#agregar-tarea").addEventListener("click",(function(){const t=document.createElement("DIV");t.classList.add("modal"),t.innerHTML='\n                <form class="formulario nueva-tarea">\n                    <legend>Agrega una nueva tarea</legend>\n                    <div class="campo">\n                        <label>Tarea</label>\n                        <input type="text" name="tarea" placeholder="Agregar tarea al proyecto actual" id="tarea"/>\n                    </div>\n                    <div class="opciones">\n                        <input type="submit" class="submit-nueva-tarea" value="Agregar nueva tarea" />\n                        <button type="button" class="cerrar-modal">Cancelar</button>\n                    </div>\n                </form>\n            ',setTimeout((()=>{document.querySelector(".formulario").classList.add("animar")}),0),t.addEventListener("click",(function(a){if(a.preventDefault(),a.target.classList.contains("cerrar-modal")){document.querySelector(".formulario").classList.add("cerrar"),setTimeout((()=>{t.remove()}),500)}a.target.classList.contains("submit-nueva-tarea")&&function(){const t=document.querySelector("#tarea").value.trim();if(""===t)return void e("El nombre de la tarea es obligatorio","error",document.querySelector(".formulario legend"));!async function(t){const a=new FormData;a.append("nombre",t),a.append("proyecto_id",function(){const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).id}());try{const t="http://localhost:3000/api/tarea",n=await fetch(t,{method:"POST",body:a}),r=await n.json();if(console.log(r),e(r.mensaje,r.tipo,document.querySelector(".formulario legend")),"exito"===r.tipo){const e=document.querySelector(".modal");setTimeout((()=>{e.remove()}),2e3)}}catch(e){console.log(e)}}(t)}()})),document.querySelector(".dashboard").appendChild(t)}))}();
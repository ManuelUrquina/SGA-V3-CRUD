

document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("#formularioEventos");
    var calendarEl = document.getElementById('calendar');
    // console.log(formulario);

    var calendar = new FullCalendar.Calendar(calendarEl, {
      // timeZone: 'UTC',
      initialView: 'dayGridMonth',
      locale:'es',
      displayEventTime: false,
      selectable: true,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listWeek'
      },
      // events: baseURL+"/evento/mostrar",
      dayMaxEvents: true,//cuando hay demasiados eventos en un día, muestra el popover
      // hiddenDays: [ 0 ], //domingo desabilitado
      // editable: true,
      eventResizableFromStart: true,

      //configurar feriados
      eventSources: [
        {
            url: baseURL + '/evento/mostrar', // Fuente de eventos existente
        },
        {
            googleCalendarApiKey: 'AIzaSyARtyhXgonZgz7ewk3V5ULloTUawRZFois',
            googleCalendarId: 'es-419.co#holiday@group.v.calendar.google.com',
            color: 'black',
            className: 'feriado',

        }
      ],

      //Tooltip de los eventos
      eventDidMount: function(info) {
        fechaUTC = moment.utc(info.event.start);
        fechafinalUTC = moment.utc(info.event.end);
        var content = '<strong>' + info.event.title + '</strong><br>'
                      // 'Descripción: ' + info.event.extendedProps.descripcion + '<br>'
                      + moment(fechaUTC).format('DD/MM/YYYY') + " - "
                      + moment(fechafinalUTC).format('DD/MM/YYYY') + '<br>';

        // console.log(content)
        tippy(info.el, {
          content: content,
          allowHTML: true,
          interactive: true,
        });
        // console.log('event:', info.event._def)

        //pasando lista de feriados
        fechaUTC = moment.utc(info.event.start);
        if (info.event._def && info.event._def.publicId && info.event._def.url ) {
          var listaFeriados = document.getElementById('listaFeriados'); // Selecciona el elemento <ul>
          var li = document.createElement('li');
          li.innerHTML = '<strong>'+info.event.title+'</strong>' + '<br>' + '<small>' +moment(fechaUTC).format(' D [de] MMMM ')+'</small>';
          li.classList.add('list-group-item','list-group-item-action','list-group-item-warning','mb-1', 'text-truncate');//clases
          listaFeriados.appendChild(li);
        }
    },

    datesSet: function() {
      // Se ejecuta cuando el usuario cambia de mes
      // Limpiar la lista de feriados
      while (listaFeriados.firstChild) {
          listaFeriados.removeChild(listaFeriados.firstChild);
      }
    },

    dateClick:function(info){
      formulario.reset();
      // console.log("fecha:", info.dateStr);
      var fechaIni = info.dateStr;
      var fechaStar = fechaIni + "T06:00";
      var fechaEnd = fechaIni + "T06:00";
        //asignamos la fecha actual en en formulario
        // formulario.start.value = info.dateStr;
        // formulario.end.value = info.dateStr;
        formulario.start.value = fechaStar;
        formulario.end.value = fechaEnd;

        //deshabilitar el botón Modificar mientras el dia no tenga un evento asignado
        if (userRole == 'admin'){
          document.getElementById('btnModificar').hidden = true;
          document.getElementById('btnEliminar').hidden = true;
        }

        $('#evento').modal('show');
      },

      eventClick: function (info) {
        //editar evento
        var evento = info.event;
        axios.post(baseURL+"/evento/editar/"+info.event.id).
        then( (respuesta) => {
            // console.log(respuesta);
            formulario.id.value = respuesta.data.id;
            formulario.title.value = respuesta.data.title;
            formulario.descripcion.value = respuesta.data.descripcion;
            formulario.color.value = respuesta.data.color;
            formulario.start.value = respuesta.data.start;
            formulario.end.value = respuesta.data.end;
            formulario.horaInicio.value = respuesta.data.horaInicio;
            formulario.horaFinal.value = respuesta.data.horaFinal;
            formulario.Codigo_ficha.value = respuesta.data.Codigo_ficha;
            formulario.Codigo_competencia.value = respuesta.data.Codigo_competencia;
            formulario.Codigo_instructor.value = respuesta.data.Codigo_instructor;
            formulario.Codigo_ambiente.value = respuesta.data.Codigo_ambiente;
            formulario.Codigo_resultado_aprendizaje.value = respuesta.data.Codigo_resultado_aprendizaje;

            // console.log(formulario.Codigo_ambiente.value)
            // habilita el boton Modificar si hay eventos
            if (userRole == 'admin'){
              document.getElementById('btnModificar').hidden = false;
              document.getElementById('btnEliminar').hidden = false;
            }
            //  //si el rol no es admin se Oculta los campos del form
            // if (userRole !== 'admin' || !info.event ) {
            //   // document.getElementById("ocultar").style.display = "none";
            //   console.log('ocultando')
            //   $("#ocultar").hide();
            // } else {
            //   console.log('mostrando');
            //   $("#ocultar").show();
            // }
            var horaInicial = moment.utc(respuesta.data.horaInicio, 'hh:mm A');
            var horaFinal = moment.utc(respuesta.data.horaFinal, 'hh:mm A');
            var sumHor = parseInt(moment.duration(horaFinal.diff(horaInicial)).asHours(),10) ;

            var fechaIni = moment.utc(respuesta.data.start);
            var fechaFnl = moment.utc(respuesta.data.end).add(1, 'd');
            var diasTotal = parseInt(moment.duration(fechaFnl.diff(fechaIni)).asDays(), 10);
            var total= sumHor * diasTotal;

            //porcentaje de dias faltantes
            var fechaActual = moment.utc();
            // var diasRestantes = fechaFnl.diff(fechaActual, 'days');
            var diasRestantes = fechaActual.diff(fechaIni, 'days');// dias vistos
            var porcentaje = (diasRestantes / diasTotal) * 100;
            porcentaje = Math.min(Math.max(porcentaje, 0), 100);//porcentaje limitado entre 0 y 100
            porcentaje = porcentaje.toFixed(1);

            // console.log( sumHor,'h ',diasTotal,'d ', 'total',total );
            // console.log(diasRestantes, 'dias vistos', porcentaje,'%');

            $('#progress-bar').css('width', porcentaje + '%');
            $('#progress-label').text(porcentaje + '%');
            $('#eventoHoraDiff').html(total + 'h'+ ' en ' + diasTotal + ' días');
            $('#eventoInstructor').html(respuesta.data.instructor.inst_Nombres);//nombre instructor
            $('#eventoInstructorApellido').html(respuesta.data.instructor.inst_Apellido);//apellido
            $('#eventoFicha').html(respuesta.data.ficha_caracterizacion.Codigo + '-'+ respuesta.data.ficha_caracterizacion.programa.prog_Denominacion);
            $('#eventoCentro').html(respuesta.data.ficha_caracterizacion.centro.cent_Denominacion);
            $('#eventoCompetencia').html(respuesta.data.competencia.comp_Denominacion);
            $('#eventoAmbiente').html(respuesta.data.ambientes.amb_Denominacion);

            //mostar el nodal
            $("#evento").modal("show");
          }).catch(error=>{ if(error.response){console.log(error.response.data);}})

          // funcionalidad para ver datos para instructor y estudiante
          var eventoSeleccionado = info.event;
          fechaUTC = moment.utc(eventoSeleccionado._instance.range.start);
          fechaFinalUTC = moment.utc(eventoSeleccionado._instance.range.end);
              // console.log(eventoSeleccionado);
              $('#eventoTitle').html(eventoSeleccionado._def.title);
              $('#eventoDescripcion').html(eventoSeleccionado.extendedProps.descripcion);
              $('#eventoFechaInicio').html(moment(fechaUTC).format('DD/MM/YYYY')+' - ');
              $('#eventoFechaFinal').html(moment(fechaFinalUTC).format('DD/MM/YYYY'));
              $('#eventoHoraInicio').html(eventoSeleccionado.extendedProps.horaInicio);
              $('#eventoHoraFinal').html(eventoSeleccionado.extendedProps.horaFinal);

              // Abrir el modal
              $('#evento').modal('show');
      },

    });
    calendar.render();

    // reseteamos la card del modal de eventos
    $('#evento').on('hidden.bs.modal', function () {
      formulario.reset();

      // Restablece los elementos <span>
      document.querySelector("#eventoTitle").textContent = "";
      document.querySelector("#eventoDescripcion").textContent = "";
      document.querySelector("#eventoFechaInicio").textContent = "";
      document.querySelector("#eventoFechaFinal").textContent = "";
      document.querySelector("#eventoHoraInicio").textContent = "";
      document.querySelector("#eventoHoraFinal").textContent = "";
      document.querySelector("#eventoFicha").textContent = "";
      document.querySelector("#eventoCompetencia").textContent = "";
      document.querySelector("#eventoInstructor").textContent = "";
      document.querySelector("#eventoInstructorApellido").textContent = "";
      document.querySelector("#eventoAmbiente").textContent = "";
      document.querySelector("#eventoHoraDiff").textContent = "";
      document.querySelector("#eventoCentro").textContent = "";
      // document.querySelector("#progress-bar").textContent = 0;
      $('#progress-bar').css('width', 0 + '%');
      // document.querySelector("#progress-label").textContent = "";
    });

    document.getElementById("btnGuardar").addEventListener("click", function(){
      var color = formulario.color.value;// Obtenemos el color seleccionado por el usuario
      // Agregamos el nuevo evento con el color seleccionado
      calendar.addEvent({
        color: color // Asignamos el color al evento
      });

      if (formulario.title.value === '' || formulario.color.value === '' || formulario.descripcion.value === '' ||
          formulario.start.value === '' || formulario.end.value === '' || formulario.Codigo_ficha.value === '' ||
          formulario.Codigo_competencia.value === '' || formulario.Codigo_instructor.value === '' || formulario.Codigo_ambiente.value === '' ){
        Swal.fire({
          title: 'Aviso',
          text:'Por favor, complete todos los campos.'
          });
      }else{
        enviarDatos("/evento/agregar");
        // alerta de éxito después de guardar
        Swal.fire({
          type: 'success',
          title: 'Guardado',
          text: 'El evento ha sido guardado exitosamente.'
        });
      }

    });

    document.getElementById("btnEliminar").addEventListener("click", function(){

      swal({
      title: '¿Estás seguro de eliminar?',
      text: 'Una vez eliminado, no se podrá recuperar',
      icon: 'warning', buttons: true, dangerMode: true}).
      then((eliminar) => {
        if (eliminar){
          enviarDatos("/evento/borrar/" + formulario.id.value);
        }else {
          swal('Elemento no eliminado');
        }});

    });

    document.getElementById("btnModificar").addEventListener("click", function(){
      enviarDatos("/evento/actualizar/" + formulario.id.value);

      // alerta de éxito después de modificar
      Swal.fire({
        type: 'success',
        title: 'Modificado',
        text: 'El evento ha sido modificado exitosamente.'
      });

    });

    function enviarDatos(url){
      const datos = new FormData(formulario);
      const nuevaURL = baseURL + url;

      axios.post(nuevaURL, datos).
      then(
        (respuesta)=>{
          calendar.refetchEvents();

          //oculta el modal
          $("#evento").modal("hide");
        }
        ).catch(
          error=>{if(error.response){console.log(error.response.data);}
          }
        )
    }

  });

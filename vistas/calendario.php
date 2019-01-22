<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include 'sideBar.php'; ?>
        </div>
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="page-header"><h2></h2>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <blockquote class="blockquote">
                                        <p class="mb-0">
                                            <?php
                                            if (isset($_SESSION['poo_agenda=user']) && !isset($_SESSION['agendaCol'])) {
                                                echo $colaborador['nombreCola']." ".$colaborador['apePaterCola'];
                                            }else{
                                                echo $cola['nombreCola']." ".$cola['apePaterCola'];
                                            }
                                            ?>
                                        </p>
                                        <footer class="blockquote-footer">
                                            <cite>
                                                <?php
                                                if (isset($_SESSION['poo_agenda=user']) && !isset($_SESSION['agendaCol'])) {
                                                    echo $cargoCola['nombreCargo'];
                                                }else{
                                                    echo $cargo['nombreCargo'];
                                                }
                                                ?>
                                            </cite>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-left form-inline"><br>
                        <div class="btn-group">
                            <button class="btn btn-primary" data-calendar-nav="prev"><< Anterior</button>
                            <button class="btn" data-calendar-nav="today">Hoy</button>
                            <button class="btn btn-primary" data-calendar-nav="next">Siguiente >></button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-warning" data-calendar-view="year">Año</button>
                            <button class="btn btn-warning active" data-calendar-view="month">Mes</button>
                            <button class="btn btn-warning" data-calendar-view="week">Semana</button>
                            <button class="btn btn-warning" data-calendar-view="day">Dia</button>
                        </div>
                    </div>
                    <?php 
                    if (isset($_SESSION['agendaCol'])) {
                        ?>
                        <?php
                    }else{
                        ?>
                        <div class="pull-right form-inline"><br>
                            <button class="btn btn-info" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                        </div>
                        <?php
                    }
                     ?>
                    

                </div>
                <hr>
                <div class="row">
                    <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->
                    <br><br>
                </div>

                <!--ventana modal para el calendario-->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body" style="height: 400px">
                                <p>One fine body&hellip;</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>

<!-- tabla de actividades -->
<h5>Lista de actividades del día</h5> <p id="parrafo"></p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Asunto
                        </th>
                        <th>
                            Ubicación
                        </th>
                        <th>
                            Inicia
                        </th>
                        <th>
                            Termina
                        </th>
                        <th>
                            Todo el día
                        </th>
                        <th>
                            Actividad
                        </th>
                        <th>
                            Avance
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Asignado por
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php //print_r($historial); ?> -->
                    <?php foreach($actividades as $data):?>
                        <tr class="active">
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['title']; ?></td>
                            <td><?php echo $data['ubiActi']; ?></td>
                            <td><?php echo $data['inicio_normal']; ?></td>
                            <td><?php echo $data['final_normal']; ?></td>
                            <td><?php 
                            if ($data['fullDayActi'] != 0) {
                                echo "SI"; 
                            }else{
                                echo "NO";
                            }
                            ?></td>
                            <td><?php echo $data['notaActi']; ?></td>
                            <td>
                                <?php if ($data['EstaActi'] == 1) {
                                    if (isset($_SESSION['agendaCol'])) {
                                        echo $data['porcenAvanActi']." %";
                                    }else{
                                        ?>
                                            <a id="btnAvance" href="#modal-container-646571" role="button" class="btn get_id" data-toggle="modal"><?php echo $data['porcenAvanActi']." %"; ?></a>
                                        <?php
                                    }
                                }else{
                                    ?>                                    
                                    <p class="bg-danger"><center><?php echo $data['porcenAvanActi']." %"; ?></center></p>
                                    <?php
                                }
                                ?>                                
                                
                                <!-- modal actualizar avance -->
                                <div class="modal fade" id="modal-container-646571" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="index.php?controller=calendario&action=actualizarAvance" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        ×
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">
                                                        Avance
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <center>
                                                            <p>Porcentaje de avance</p>
                                                        <br>
                                                        <span>
                                                            <!-- <input type="text" name=""> -->
                                                            Valor: <input type="text" name="valorAvance" id="valorAvance" value="" style="text-align:center;">
                                                            <input type="hidden" name="txtIdActividad" id="txtIdAvance" value="">
                                                        </span>
                                                    </center>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        Cerrar
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </td>
                            <?php 
                            if ($data['codiEstaActi'] == '005') {
                            ?>
                                <td class="danger"><?php echo $data['nombreEstaActi']; ?></td>
                            <?php
                            }else{
                            ?>
                                <td class="success"><?php echo $data['nombreEstaActi']; ?></td>
                            <?php
                            }
                             ?>

                             
                            
                            <td><?php echo $data['nombreCola']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
<!-- fin tabla actividades -->

        </div>
    </div>
</div>
        <script type="text/javascript">
            (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los eventos se mostraran en ventana modal
                    modal: '#events-modal',

                        // dentro de un iframe
                        modal_type:'iframe',

                        //obtenemos los eventos de la base de datos
                        events_source: 'vistas/obtener_eventos.php',

                        // mostramos el calendario en el mes
                        view: 'month',

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,


                        // definimos el idioma por defecto
                        language: 'es-ES',

                        //Template de nuestro calendario
                        tmpl_path: 'vistas/tmpls/',
                        tmpl_cache: false,

                        // Hora de inicio
                        time_start: '08:00',

                        // y Hora final de cada dia
                        time_end: '24:00',

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '80%',

                        onAfterEventsLoad: function(events)
                        {
                            if(!events)
                            {
                                return;
                            }
                            var list = $('#eventlist');
                            list.html('');

                            $.each(events, function(key, val)
                            {
                                $(document.createElement('li'))
                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                .appendTo(list);
                            });
                        },
                        onAfterViewLoad: function(view)
                        {
                            $('.page-header h2').text(this.getTitle());
                            $('.btn-group button').removeClass('active');
                            $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                            months: {
                                general: 'label'
                            }
                        }
                    };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options);

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                    var $this = $(this);
                    $this.click(function()
                    {
                        calendar.navigate($this.data('calendar-nav'));
                    });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                    var $this = $(this);
                    $this.click(function()
                    {
                        calendar.view($this.data('calendar-view'));
                    });
                });

                $('#first_day').change(function()
                {
                    var value = $(this).val();
                    value = value.length ? parseInt(value) : null;
                    calendar.setOptions({first_day: value});
                    calendar.view();
                });
            }(jQuery));
        </script>

        <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Agregar nueva Actividad</h4>
                </div>
            <div class="modal-body">
                <form action="index.php?controller=calendario&action=get_datosC" method="post">
                <!-- <form action="index.php?controller=calendario&action=prueba" method="post">pruebas -->
                    
                    <label for="txtColaborador">Colaborador</label>
                    <input type="text" required autocomplete="off" name="txtColaborador" class="form-control" id="txtColaborador" value='<?php echo $colaborador['nombreCola']; ?>'>
                    <input type="hidden" id="codiCola" name="codiCola" value='<?php echo $colaborador['codiCola']; ?>'>
                    <label for="from">Inicio</label>
                    <div class='input-group date' id='from'>
                        <input type='text' id="from" name="from" class="form-control"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>

                    <label for="to">Final</label>
                    <div class='input-group date' id='to'>
                        <input type='text' name="to" id="to" class="form-control"/>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>

                    <label for="tipo">Tipo de Actividad</label>
                    <select class="form-control" name="codiTipoActi" id="tipo">
                        <?php foreach($tipoActividades as $data): ?>
                        <option value="<?php echo $data['codiTipoActi'];?> "><?php echo $data['nombreTipoActi']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <label for="tipo">Relevancia</label>
                    <select class="form-control" name="imporActi" id="imporActi">
                        <option value="event-success">Baja</option>
                        <option value="event-warning">Media</option>
                        <option value="event-important">Alta</option>
                    </select>
                    <label for="title">Título</label>
                    <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">
                    <label for="body">Descripción</label>
                    <textarea id="body" name="event" required rows="2"></textarea>                    

                    <label for="ubiActi">Ubicación</label>
                    <!-- Select Basic -->
                    <select id="cmbUbiActi" name="cmbUbiActi" class="form-control">
                        <option value="Sala de reuniones Perú Data">Sala de reuniones Perú Data</option>
                        <option value="Banco Crédito del Perú (BCP)">Banco Crédito del Perú (BCP)</option>
                        <option value="Cámara de comercio Huancayo">Cámara de comercio Huancayo</option>
                        <option value="Oficina Lima">Oficina Lima</option>
                        <option value="otro">Otro</option>
                    </select>
                    <br>
                    <input type="text" required autocomplete="off" name="ubiActi" class="form-control" id="ubiActi" placeholder="Ubicación" disabled="">
                    <input type="hidden" name="txtColAsig" value="<?php echo $_SESSION['poo_agenda=user']; ?>"> <!-- el usuario DEBE ser el dni sino se rompe la asignacion -->

                    <script type="text/javascript">
                        $(function () {
                            $('#from').datetimepicker({
                                language: 'es'
                                // ,minDate: new Date()
                            });
                            $('#to').datetimepicker({
                                language: 'es'
                                // ,minDate: new Date()
                            });

                        });
                    </script>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                      <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                    </div>
                </form>
            </div>
      </div>
    </div>
</div>


<script type="text/javascript">
    $(".get_id").click(function(){
        id = $(this).parents("tr").find("td").eq(0).html();
        $( "input[name^='txtIdActividad']" ).val( id );
    });
    CKEDITOR.replace( 'body' );
</script>
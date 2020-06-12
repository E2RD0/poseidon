<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Clientes');
dashboardTemplate::dashMenu('clientes');
?>

<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <ul class="nav nav-categorias" role="tablist">
                        <li class="nav-item">
                            <a data-toggle="tab" href="#alquileres" class="nav-link active dash__tab_title" aria-expanded="true">Clientes</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane active py-3 px-3 px-sm-0" id="alquileres" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table dash__main_table w-100" id="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellido(s)</th>
                                    <th>Correo</th>
                                    <th>Dirección</th>
                                    <th class="text-right">Teléfono</th>
                                    <th class="text-right">Fecha de registro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.com</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas1" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas1" aria-expanded="false" aria-controls="mas1">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas2" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas2" aria-expanded="false" aria-controls="mas2">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas3" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas3" aria-expanded="false" aria-controls="mas3">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas4" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas4" aria-expanded="false" aria-controls="mas4">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas5" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas5" aria-expanded="false" aria-controls="mas5">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas6" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas6" aria-expanded="false" aria-controls="mas6">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas7" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas7" aria-expanded="false" aria-controls="mas7">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas8" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas8" aria-expanded="false" aria-controls="mas8">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas9" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas9" aria-expanded="false" aria-controls="mas9">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas10" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas10" aria-expanded="false" aria-controls="mas10">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas11" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas11" aria-expanded="false" aria-controls="mas11">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas12" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas12" aria-expanded="false" aria-controls="mas12">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas13" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas13" aria-expanded="false" aria-controls="mas13">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas14" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas14" aria-expanded="false" aria-controls="mas14">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Andrew</td>
                                    <td>Mike</td>
                                    <td>andrew.m@gmail.co</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        <div id="mas15" aria-expanded="false" class="collapse">
                                            <div class="well">
                                                explicabo iste veniam provident quasi laboriosam, aperiam numquam aut laudantium
                                                harum sapiente obcaecati repellendus tempora enim quo voluptatibus,
                                                reprehenderit, molestias at?
                                            </div>
                                        </div>
                                        <label data-toggle="collapse" data-target="#mas15" aria-expanded="false" aria-controls="mas15">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </label>
                                    </td>
                                    <td class="text-right">98989898</td>
                                    <td class="text-right">09/05/2015</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
dashboardTemplate::dashEnd('clientes.php');
?>

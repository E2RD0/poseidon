<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Usuarios');
dashboardTemplate::dashMenu('usuarios');
?>
<main>
    <div class="container-fluid position-absolute dash__main">
        <div class="row mx-0 my-2">
            <div class="dash__main_card col-12">
                <div class="col-md-12 col-lg-12 p-0">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="col-md-12 col-lg-12 p-0">
                                <ul class="nav nav-categorias justify-content-center justify-content-lg-start" role="tablist">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#usuarios" class="nav-link active dash__tab_title" aria-expanded="true">Usuarios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#agregarusuario" class="nav-link dash__tab_title" aria-expanded="true">Agregar un usuario</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active py-3 px-3 px-sm-0" id="usuarios" role="tabpanel">
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
                                                    <th class="text-right">Opciones</th>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
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
                                                    <td class="td-actions text-center">
                                                        <div class="dropdown">
                                                            <i class="fas fa-ellipsis-h dash__dropdown" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-edit"></i>
                                                                        <p>Modíficar</p>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-divider"></div>
                                                                <button class="dropdown-item" type="button">
                                                                    <span>
                                                                        <i class="fas fa-times"></i>
                                                                        <p>Eliminar</p>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane py-3 px-3 px-sm-0" id="agregarusuario" role="tabpanel">
                                    <div class="row my-5">
                                        <div class="col-12 col-lg-6 mx-md-auto">
                                            <div class="ml-lg-4">
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-2 ml-md-0">
                                                        <p class="text-md-right">Nombre(s)</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-2 ml-md-0">
                                                        <p class="text-md-right">Apellido(s)</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-2 ml-md-0">
                                                        <p class="text-md-right">Correo eléctronico</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <input id="text" type="email" class="dash__text_fields form-field__input" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4 ml-md-2">
                                                    <div class="col-12 col-md-2 ml-md-0">
                                                        <p class="text-md-right">Dirección</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="col-12">
                                                            <div class="form-field">
                                                                <div class="form-field__control">
                                                                    <textarea id="exampleTextarea" class="form-field__textarea dash__text_fields"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-4 ml-md-2">
                                                    <div class="col-12 col-md-2 ml-md-0">
                                                        <p class="text-md-right">Tipo de usuario</p>
                                                    </div>
                                                    <div class="col-12 col-md-10 mt-md-2">
                                                        <div class="dropdown ml-3">
                                                            <button class="btn btn-outline-warning dropdown-toggle" type="button" id="categoria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Seleccionar...
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="categoria">
                                                                <a class="dropdown-item" href="#">Categoría 1</a>
                                                                <a class="dropdown-item" href="#">Categoría 2</a>
                                                                <a class="dropdown-item" href="#">Categoría 3</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center justify-content-md-end">
                                                <div class="">
                                                    <div class="mr-md-5 text-center">
                                                        <button type="button" class="ml-auto btn recover__button" onclick="location.href='usuarios.php'">Cancelar</button>
                                                        <button type="button" class="btn main__button">Agregar usuario</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-6 d-none d-lg-inline justify-content-center">
                                            <span class="user">
                                                <svg class="dash__user_svg" width="500px" height="500px" data-name="Layer 2" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                                                    <style type="text/css">
                                                        .st1 {
                                                            fill-rule: evenodd;
                                                            clip-rule: evenodd;
                                                            fill: rgba(254, 219, 63, 0.31);
                                                        }
                                                    </style>
                                                    <path class="st1" d="m16 2a14.001 14.001 0 0 0 -10 23.8c0.33 0.33 0.67 0.64 1.03 0.94a10.427 10.427 0 0 0 1.13 0.85 13.957 13.957 0 0 0 15.68 0 10.427 10.427 0 0 0 1.1299 -0.85c0.36005-0.3 0.7-0.61 1.03-0.94a14.001 14.001 0 0 0 -10 -23.8zm9.6 21.2a10.021 10.021 0 0 0 -6.15 -6.58 5 5 0 1 0 -6.9 0 10.021 10.021 0 0 0 -6.15 6.58 12 12 0 1 1 19.2 0z" />
                                                </svg>
                                            </span>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
dashboardTemplate::dashEnd('users.js');
?>

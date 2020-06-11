<?php
require_once('templates/dashboard_template.php');
dashboardTemplate::dashHead('Productos');
dashboardTemplate::dashMenu('productos');
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
                                        <a data-toggle="tab" href="#productos" class="nav-link active dash__tab_title" aria-expanded="true">Productos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#agregarproducto" class="nav-link dash__tab_title" aria-expanded="true">Agregar un producto</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active py-3 px-3 px-sm-0" id="productos" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table dash__main_table w-100" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nombre</th>
                                                    <th>Disponibilidad</th>
                                                    <th class="text-center">Precio</th>
                                                    <th>Categoría</th>
                                                    <th class="text-center">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Tabla de surf X</td>
                                                    <td>
                                                        <div class="w-100">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="dash__sc1c_text">5 restantes</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$9.99</td>
                                                    <td>Tablas para Surf</td>
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
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#review" id="modal_open">
                                                                    <span>
                                                                        <i class="fas fa-comments"></i>
                                                                        <p>Reseñas</p>
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
                                                    <td>Tabla de surf X</td>
                                                    <td>
                                                        <div class="w-100">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="dash__sc1c_text">5 restantes</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$9.99</td>
                                                    <td>Tablas para Surf</td>
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
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#review" id="modal_open">
                                                                    <span>
                                                                        <i class="fas fa-comments"></i>
                                                                        <p>Reseñas</p>
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
                                                    <td>Tabla de surf X</td>
                                                    <td>
                                                        <div class="w-100">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="dash__sc1c_text">5 restantes</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$9.99</td>
                                                    <td>Tablas para Surf</td>
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
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#review" id="modal_open">
                                                                    <span>
                                                                        <i class="fas fa-comments"></i>
                                                                        <p>Reseñas</p>
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
                                                    <td>Tabla de surf X</td>
                                                    <td>
                                                        <div class="w-100">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="dash__sc1c_text">5 restantes</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$9.99</td>
                                                    <td>Tablas para Surf</td>
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
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#review" id="modal_open">
                                                                    <span>
                                                                        <i class="fas fa-comments"></i>
                                                                        <p>Reseñas</p>
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
                                                    <td>Tabla de surf X</td>
                                                    <td>
                                                        <div class="w-100">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="dash__sc1c_text">5 restantes</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$9.99</td>
                                                    <td>Tablas para Surf</td>
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
                                                                        <i class="fas fa-comments"></i>>
                                                                        <p>Reseñas</p>
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
                                                    <td>Tabla de surf X</td>
                                                    <td>
                                                        <div class="w-100">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <p class="dash__sc1c_text">5 restantes</p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">$9.99</td>
                                                    <td>Tablas para Surf</td>
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
                                                                <button class="dropdown-item" type="button" data-toggle="modal" data-target="#review" id="modal_open">
                                                                    <span>
                                                                        <i class="fas fa-comments"></i>
                                                                        <p>Reseñas</p>
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
                                <div class="tab-pane py-3 px-3 px-sm-0" id="agregarproducto" role="tabpanel">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="ml-lg-4">
                                                    <div class="row mt-4 ml-md-2">
                                                        <div class="col-12 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Nombre del producto</p>
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
                                                    <div class="row mt-3 ml-md-2">
                                                        <div class="col-12 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Descripción</p>
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
                                                    <div class="row mt-3 ml-md-2">
                                                        <div class="col-12 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Categoría</p>
                                                        </div>
                                                        <div class="col-12 col-md-10 mt-md-2">
                                                            <div class="dropdown ml-3">
                                                                <button class="btn btn-outline-warning dropdown-toggle " type="button" id="categoria" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Seleccionar...
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="categoria">
                                                                    <a class="dropdown-item" href="#">Action</a>
                                                                    <a class="dropdown-item" href="#">Another action</a>
                                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 ml-md-2">
                                                        <div class="col-12 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Precio</p>
                                                        </div>
                                                        <div class="col-12 col-md-10 mt-md-2">
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-field">
                                                                    <div class="form-field__control">
                                                                        <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 ml-md-2">
                                                        <div class="col-12 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Existencias</p>
                                                        </div>
                                                        <div class="col-12 col-md-10 mt-md-2">
                                                            <div class="col-md-4 col-12">
                                                                <div class="form-field">
                                                                    <div class="form-field__control">
                                                                        <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 ml-md-2">
                                                        <div class="col-5 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Se puede alquilar</p>
                                                        </div>
                                                        <div class="col-3 mt-md-3 mt-1">
                                                            <div class="row ml-md-3">
                                                                <p class="">
                                                                    <input type="checkbox" class="c filled-in" id="recordar" data-toggle="collapse" href="#alquilar" role="textbox" aria-expanded="false" aria-controls="collapseExample" />
                                                                    <label for="recordar"></label>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="collapse" id="alquilar">
                                                        <div class="row mt-3 ml-md-2">
                                                            <div class="col-12 col-md-2 ml-md-0">
                                                                <p class="text-md-right">Poliza</p>
                                                            </div>
                                                            <div class="col-12 col-md-10 mt-md-2">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-field">
                                                                        <div class="form-field__control">
                                                                            <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3 ml-md-2">
                                                            <div class="col-12 col-md-2 ml-md-0">
                                                                <p class="text-md-right">Precio de alquiler</p>
                                                            </div>
                                                            <div class="col-12 col-md-10 mt-md-2">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-field">
                                                                        <div class="form-field__control">
                                                                            <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3 ml-md-2">
                                                            <div class="col-12 col-md-2 ml-md-0">
                                                                <p class="text-md-right">Existencias de alquiler</p>
                                                            </div>
                                                            <div class="col-12 col-md-10 mt-md-2">
                                                                <div class="col-md-4 col-12">
                                                                    <div class="form-field">
                                                                        <div class="form-field__control">
                                                                            <input id="text" type="text" class="dash__text_fields form-field__input" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 mt-2">
                                                <div class="row">
                                                    <div class="col-12 col-md-2 text-md-right ">
                                                        <p>Subir imágenes</p>
                                                    </div>
                                                    <div class="col-12 col-md-8 ml-md-4 ml-0">
                                                        <div class="row rounded bg-gray shadow-sm">
                                                            <div class="input-group mt-2 mx-2">
                                                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" multiple>
                                                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Ningun archivo seleccionado</label>
                                                                <div class="input-group-append">
                                                                    <label for="upload" class="btn btn-light m-0 rounded-pill"> <i class="fa fa-cloud-upload text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Añadir imagen</small></label>
                                                                </div>
                                                            </div>
                                                            <div class="image-area">
                                                                <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-md-end justify-content-center">
                                            <div class="">
                                                <div class="mr-md-5 text-center">
                                                    <button type="button" class="ml-auto btn recover__button" onclick="location.href='productos.php'">Cancelar</button>
                                                    <button type="button" class="btn main__button">Agregar producto</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade dash__full" id="review" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom mw-100 w-100" role="document" id="check_mq">
        <div class="modal-content">
            <div class="container-fluid">
                <div class="row mx-lg-5">
                    <div class="col-12 col-md-2 mt-1">
                        <ul class="nav nav-categorias justify-content-center justify-content-lg-start" role="tablist">
                            <li class="nav-item">
                                <a data-toggle="tab" href="#productos" class="nav-link active dash__tab_title" aria-expanded="true">Reseñas</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-6 mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="font-weight-bold">Producto:</p>
                                        <p class="mt-n3">Tabla de surf x</p>
                                        <p class="mt-n3 dash__sc1c_text font-italic">8 opiniones</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-right mt-2">
                                <button type="button" class="ml-auto btn recover__button" data-dismiss="modal">Atrás</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row mx-xl-5">
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 my-3 mx-auto">
                                <div class="col-12 shadow bg-white">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center text-xl-left col-xl-4 p-3">
                                            <div class="col-12">
                                                <p class="font-weight-bold">David James</p>
                                            </div>
                                            <div class="col-12 mt-n3 review__punctuation">
                                                <p>Puntuación:</p>
                                            </div>
                                            <div class="col-12 mt-n2">
                                                <p class="ml-xl-5 review__grade">4.5</p>
                                            </div>
                                            <div class="col-12 ml-xl-n3 mt-n2">
                                                <div class="star-rating" title="Rated 0 out of 5">
                                                    <span class="review-count">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-xl-8 pt-3 ml-xl-n3">
                                            <div class="row">
                                                <div class="col-11 text-right">
                                                    <button type="button" class="close review__close">
                                                        <span aria-hidden="true">
                                                            <i class="fas fa-times p-1"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-12">
                                                    <p class="mr-xl-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                        Quasi ipsa, nemo eos debitis, corporis quo dolorum omnis
                                                        cupiditate ut non qui dolore maxime aliquam consequuntur
                                                        sed accusantium quia ipsum! Necessitatibus?</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    dashboardTemplate::dashEnd('productos.js');
    ?>

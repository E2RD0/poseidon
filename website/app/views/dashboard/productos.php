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
                                        <a data-toggle="tab" href="#productos" class="nav-link active dash__tab_title" aria-expanded="true" id="products">Productos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#agregarproducto" class="nav-link dash__tab_title" aria-expanded="true" id="products-title">Agregar un producto</a>
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
                                            </tbody>
                                            <div id="productosSpinner" class="w-100 text-center">
                                                No hay ningún registro
                                            </div>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane py-3 px-3 px-sm-0" id="agregarproducto" role="tabpanel">
                                    <form id="products-form" method="POST" action="">
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
                                                                        <input id="inputNombre" type="text" name="nombre" class="dash__text_fields form-field__input" />
                                                                    </div>
                                                                    <p class="form-error-label" id="errorNombre"></p>
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
                                                                        <textarea id="inputDescripcion" name="descripcion" class="form-field__textarea dash__text_fields"></textarea>
                                                                    </div>
                                                                    <p class="form-error-label" id="errorDescripcion"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 ml-md-2">
                                                        <div class="col-12 col-md-2 ml-md-0">
                                                            <p class="text-md-right">Categoría</p>
                                                        </div>
                                                        <div class="col-12 col-md-10 mt-md-2">
                                                            <div class="input-group ml-3">
                                                                <div>
                                                                    <select class="custom-select" name="idcategoriaproducto" id="inputCategoria">
                                                                        <option selected value="Selecciona...">Selecciona...</option>
                                                                    </select>
                                                                </div>
                                                                <div class="w-100"></div>
                                                                <p class="form-error-label" id="errorCategoria"></p>
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
                                                                        <input id="inputPrecio" type="text" name="precio" class="dash__text_fields form-field__input" />
                                                                    </div>
                                                                    <p class="form-error-label" id="errorPrecio"></p>
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
                                                                        <input id="inputExistencias" type="text" name="existenciascompra" class="dash__text_fields form-field__input" />
                                                                    </div>
                                                                    <p class="form-error-label" id="errorExistencias"></p>
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
                                                                    <input type="hidden" name="sepuedealquilar" value="off" />
                                                                    <input type="checkbox" class="c filled-in" id="sePuedeAlquilar" name="sepuedealquilar" data-toggle="collapse" href="#alquilar" role="checkbox" aria-expanded="false" aria-controls="collapseExample" />
                                                                    <label for="sePuedeAlquilar"></label>
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
                                                                            <input id="inputPoliza" type="text" name="poliza" class="dash__text_fields form-field__input" />
                                                                        </div>
                                                                        <p class="form-error-label" id="errorPoliza"></p>
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
                                                                            <input id="inputPrecioAlquiler" type="text" name="precioalquiler" class="dash__text_fields form-field__input" />
                                                                        </div>
                                                                        <p class="form-error-label" id="errorPrecioAlquiler"></p>
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
                                                                            <input id="inputExistenciasAlquiler" type="text" name="existenciasalquiler" class="dash__text_fields form-field__input" />
                                                                        </div>
                                                                        <p class="form-error-label" id="errorExistenciasAlquiler"></p>
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
                                                                <input id="upload" type="file" onchange="readURL(this);" class="d-none form-control border-0" multiple>
                                                                <div class="input-group-append">
                                                                    <label for="upload" class="btn btn-light m-0 rounded-pill"> <i class="fa fa-cloud-upload text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Añadir imagen</small></label>
                                                                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Ningun archivo seleccionado</label>
                                                                </div>
                                                            </div>
                                                            <div class="image-area" id="img-area">
                                                                <!--<img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">!-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="form-error-label" id="errorProducts"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-md-end justify-content-center">
                                            <div class="">
                                                <div class="mr-md-5 text-center">
                                                    <button type="button" class="ml-auto btn recover__button d-none" id="products-cancel">Cancelar</button>
                                                    <button type="submit" class="btn main__button" id="products-submit">Agregar producto</button>
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
<?php
dashboardTemplate::dashReviews();
dashboardTemplate::dashEnd('productos.js');
?>

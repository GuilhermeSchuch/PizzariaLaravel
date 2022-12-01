<x-header />

@if (session("error"))
    <div class="alert alert-danger msg">{{ session("error") }}</div>
@endif

<x-navbar :navbar="$navbar"/>



<div class="dashboard-container manage-container">
    <section class="manage">
        <div class="container">
            <h1>Gerenciar Massas</h1>
            <div class="actions">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <ion-icon name="add-outline"></ion-icon>
                </button>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5>Adicione uma nova massa!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ route('storeMassa') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="massa" style="color: orange">Nome</label>
                                    <input type="text" class="form-control" name="massa"  placeholder="Insira o nome da Massa">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                    <ion-icon name="arrow-down-circle-outline"></ion-icon>
                    </button>
                  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Lista de Massas</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                forEach($massas as $massa){
                                    echo $massa[0];
                                    echo "<br>";
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>


                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    <ion-icon name="trash-outline"></ion-icon>
                </button>
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Deletar Massa</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <?php forEach($massas as $massa):?>
                                    <form action="{{ route('massa.destroy', $massa[0]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <p>
                                            {{ $massa[0] }}
                                            <button type='submit'><ion-icon name='trash-outline'></ion-icon></button>
                                        </p>
                                    </form>
                                <?php endforeach; ?>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><ion-icon name="create-outline"></ion-icon></button>
  
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5>Edite uma Massa!</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                            <div class="modal-body">
                                <?php forEach($massas as $massa):?>
                                    <form action="{{ route('massa.update', $massa[0]) }}" method="post">
                                        @method('put')
                                        @csrf  

                                        <div class="form-group">
                                            <label for="nome" class="col-form-label" style="color: orange">Nome:</label>
                                            <input type="text" class="form-control" name="nome{{ $massa[0] }}" value="{{ $massa[0] }}">
                                            <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1vh">Salvar</button>
                                        </div>
                                    </form>
                                <?php endforeach; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </section>

    <section class="manage">
      <div class="container">
          <h1>Gerenciar Bordas</h1>
          <div class="actions">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bordaModal">
                  <ion-icon name="add-outline"></ion-icon>
              </button>
                <div class="modal fade" id="bordaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Adicione uma nova borda!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('storeBorda') }}" method="POST">
                          {{ csrf_field() }}
                          <div class="modal-body">
                              <div class="form-group">
                                  <label for="borda" style="color: orange">Nome:</label>
                                  <input type="text" class="form-control" name="borda"  placeholder="Insira o nome da Borda">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-primary">Adicionar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bordaModalLong">
                  <ion-icon name="arrow-down-circle-outline"></ion-icon>
                  </button>
                <div class="modal fade" id="bordaModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Lista de Bordas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <?php
                              forEach($bordas as $borda){
                                  echo $borda["tipo"];
                                  echo "<br>";
                              }
                          ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bordaModalCenter">
                  <ion-icon name="trash-outline"></ion-icon>
              </button>
                <div class="modal fade" id="bordaModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Deletar Borda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body">
                              <?php forEach($bordas as $borda):?>
                                  <form action="{{ route('borda.destroy', $borda["tipo"]) }}" method="post">
                                      @method('delete')
                                      @csrf
                                      <p>
                                          {{ $borda["tipo"] }}
                                          <button type='submit'><ion-icon name='trash-outline'></ion-icon></button>
                                      </p>
                                  </form>
                              <?php endforeach; ?>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bordaEditModal"><ion-icon name="create-outline"></ion-icon></button>

                <div class="modal fade" id="bordaEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Edite uma Borda!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                          <div class="modal-body">
                              <?php forEach($bordas as $borda):?>
                                  <form action="{{ route('borda.update', $borda["tipo"]) }}" method="post">
                                      @method('put')
                                      @csrf  

                                      <div class="form-group">
                                          <label for="nome" class="col-form-label" style="color: orange">Nome:</label>
                                          <input type="text" class="form-control" name="nome{{ $borda["tipo"] }}" value="{{ $borda["tipo"] }}">
                                          <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1vh">Salvar</button>
                                      </div>
                                  </form>
                              <?php endforeach; ?>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          </div>
                    </div>
                  </div>
                </div>

          </div>
      </div>
    </section>

    <section class="manage">
      <div class="container">
          <h1>Gerenciar Sabores</h1>
          <div class="actions">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saborModal">
                  <ion-icon name="add-outline"></ion-icon>
              </button>
                <div class="modal fade" id="saborModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Adicione um novo sabor!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('storeSabor') }}" method="POST">
                          {{ csrf_field() }}
                          <div class="modal-body">
                              <div class="form-group">
                                  <label for="sabor" style="color: orange">Nome</label>
                                  <input type="text" class="form-control" name="sabor"  placeholder="Insira o nome do Sabor">
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                              <button type="submit" class="btn btn-primary">Adicionar</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saborModalLong">
                  <ion-icon name="arrow-down-circle-outline"></ion-icon>
                  </button>
                <div class="modal fade" id="saborModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Lista de Sabores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <?php
                              forEach($sabores as $sabor){
                                  echo $sabor["nome"];
                                  echo "<br>";
                              }
                          ?>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saborModalCenter" style="background-color: red">
                  <ion-icon name="trash-outline"></ion-icon>
              </button>
                <div class="modal fade" id="saborModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Deletar Borda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <div class="modal-body">
                              <?php forEach($sabores as $sabor):?>
                                  <form action="{{ route('sabor.destroy', $sabor["nome"]) }}" method="post">
                                      @method('delete')
                                      @csrf
                                      <p>
                                          {{ $sabor["nome"] }}
                                          <button type='submit'><ion-icon name='trash-outline'></ion-icon></button>
                                      </p>
                                  </form>
                              <?php endforeach; ?>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#saborEditModal" style="background-color: red"><ion-icon name="create-outline"></ion-icon></button>

                <div class="modal fade" id="saborEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5>Edite um Sabor!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                          <div class="modal-body">
                              <?php forEach($sabores as $sabor):?>
                                  <form action="{{ route('sabor.update', $sabor["nome"]) }}" method="post">
                                      @method('put')
                                      @csrf  

                                      <div class="form-group">
                                          <label for="nome" class="col-form-label" style="color: orange">Nome:</label>
                                          <input type="text" class="form-control" name="nome{{ $sabor["nome"] }}" value="{{ $sabor["nome"] }}">
                                          <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1vh">Salvar</button>
                                      </div>
                                  </form>
                              <?php endforeach; ?>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                          </div>
                    </div>
                  </div>
                </div>

          </div>
      </div>
  </section>
</div>



<style>
  .alert{
    z-index: 99;
    margin-top: 1vh;
  }


  .btn{
    background-color: red
  }

  .btn:hover{
    background-color: orange
  }

  .modal-header, .modal-body, .modal-footer{
    background-color: transparent;
    font-weight: bold;
    border: none;
    color: orange;
  }

  .modal-header{
    border-bottom: 1px solid orange;
  }

  .modal-header h5{
    font-weight: bold;
    /* color: black; */
    color: orange;
    
  }

  .modal-content{
    /* background-color: rgba(255, 166, 0, 0.767); */
    background-color: rgba(0, 0, 0, 0.8);
    font-weight: bold;
  }

  .close{
    color: red;
  }

  .close:hover{
    color: orange;
  }

  button[type="submit"]{
    background-color: red;
    cursor: pointer;
    transition: .5s;
  }

  button[type="submit"]:hover{
    background-color: orange;
  }

  button[type="button"]{
    border: 1px solid orange;
    box-shadow: none;
  }

  button[type="button"]:focus{
    border: 1px solid orange;
    box-shadow: none;
  }

  input[type="text"]{
    background-color: transparent;
    border: none;
    border-bottom: 1px solid orange;
    outline: none;
    color: orange;
    transition: .5s;
  }

  input[type="text"]:focus{
    background-color: transparent;
    border: none;
    border-bottom: 1px solid orange;
    outline: none;
    color: red;
    box-shadow: none;
  }

  input[type="text"]::placeholder{
    color: red;
  }
</style>



<x-footer />
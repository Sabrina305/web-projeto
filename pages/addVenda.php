<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Sapataria Moon -  Venda</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var total = 0;
            function adicionarNoCarrinho(id, marca, preco) {
                var linha = document.createElement("tr");
                var colunaId = document.createElement("td");
                var colunaMarca = document.createElement("td");
                var colunaPreco = document.createElement("td");
                var colunaQuantidade = document.createElement("td");
                colunaId.appendChild(document.createTextNode(id));
                colunaMarca.appendChild(document.createTextNode(marca));
                colunaPreco.appendChild(document.createTextNode(preco));
                colunaPreco.setAttribute("class","preco");
                colunaQuantidade.innerHTML = "<input type='number' value='1' class='quantidade' onchange='atualizarValor(" + preco + ",this.value)' />";

                //adicionar colunas na linha;
                linha.appendChild(colunaId);
                linha.appendChild(colunaMarca);
                linha.appendChild(colunaPreco);
                linha.appendChild(colunaQuantidade);
                //adicionar a linha na tabela.
                document.getElementById("tbodyCarrinho").appendChild(linha);

                adicionarPreco(preco, 1);
            }
            function adicionarPreco(preco, quantidade) {
                total += (preco * quantidade);
                document.getElementById("total").innerHTML = total;
            }

            function atualizarValor(preco, quantidade) {
                novoTotal=0;
                var precos=document.getElementsByClassName("preco");
                var quantidades=document.getElementsByClassName("quantidade");
                
                for (i=0;i<precos.length;i++){
                novoTotal+=(precos[i].innerHTML*quantidades[i].value);
                }
                document.getElementById("total").innerHTML = novoTotal;
            }

        </script>

    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Sapataria Moon</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/sapataria/pages/menuLateral.php" ?>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Venda</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>


                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Listagem dos Modelos
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Marca</th>
                                                    <th>Cor</th>
                                                    <th>Tipo</th>
                                                    <th>Preco</th>
                                                    <th>Tamanho</th>
                                                    <th>Estoque</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require_once $_SERVER['DOCUMENT_ROOT'] . "/sapataria/dao/ModeloDAO.php";
                                                $dao = new ModeloDAO();
                                                $lista = $dao->listarTodos();
                                                foreach ($lista as $modelo) {
                                                    echo "<td>" . $modelo->getId() . "</td>";
                                                    echo "<td>" . $modelo->getMarca() . "</td>";
                                                    echo "<td>" . $modelo->getCor() . "</td>";
                                                    echo "<td>" . $modelo->getTipo() . "</td>";
                                                    echo "<td>" . $modelo->getPreco() . "</td>";
                                                    echo "<td>" . $modelo->getTamanho() . "</td>";
                                                    echo "<td>" . $modelo->getEstoque() . "</td>";
                                                    echo "<td><button  class ='btn btn-primary btn-circle' onclick='adicionarNoCarrinho(\"" . $modelo->getId() . "\",\"" . $modelo->getMarca() . "\"," . $modelo->getPreco() . ")'><i class='fa fa-cart-plus'></i></button></td>";
                                                    echo "</tr>";
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->


                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <!-- /.panel -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Carrinho de Compras
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Marca</th>
                                                            <th>Preço</th>
                                                            <th>Quantidade</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyCarrinho">


                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->


                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h2> Total: R$ <span id="total"></span></h2>
                                </div>
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->


                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>

    </body>
</html>
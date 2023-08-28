<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferre-Vente Cotizacion</title>

</head>


<style>
    .direccion {
        font-size: 14px;
    }


    .texto-sm {
        font-size: 10px;
    }

    .texto-md {
        font-size: 12px;
    }


    .arreglando {
        vertical-align: auto;
    }


    .img {
        margin: auto;
    }

    .nopadding {
        padding: 5px !important;
    }


    .text1{
     
        width: 33%;
    }


    .text2{
        
        width: 33%;
    }


</style>

<body>

    <div class="container-fluid">

        <div class="row center__horizontal ">



            <div style="float: left; width: 25%; height: 10%; ">
                <div class="img">
                    <img src="{{ public_path('img/ferrevente.png') }}" width="150px" alt="" srcset="">
                </div>
            </div>
            <div class="text1">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut dignissimos commodi quasi ea mollitia! Labore, perferendis vero ea ut obcaecati quibusdam magnam totam harum dolorum officia laudantium, quia maxime amet!
            </div>

            <div class="text2">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam necessitatibus repudiandae minus illum obcaecati cupiditate, eaque modi? Nesciunt assumenda temporibus rerum. Nisi necessitatibus quis earum dolorem dolor enim voluptate eveniet.
            </div>
            <div>






            </div>

        </div>

        <br>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr class="texto-md nopadding">
                        <th class="texto-md nopadding" scope="col ">Codigo</th>
                        <th class="texto-md nopadding" scope="col ">Producto</th>
                        <th class="texto-md nopadding" scope="col ">Cantidad</th>
                        <th class="texto-md nopadding" scope="col ">Precio Unit. dolares</th>
                        <th class="texto-md nopadding" scope="col ">Precio Total dolares</th>
                        <th class="texto-md nopadding" scope="col ">Precio Unit. Bs</th>
                        <th class="texto-md nopadding" scope="col ">Precio Total Bs</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($products as $product)
                    <tr class="texto-sm nopadding">
                        <td class="text-center nopadding">{{$product->codigo}}</td>
                        <td class="texto-sm nopadding ">{{$product->producto}} </td>
                        <td class="text-center nopadding">{{$product->cantidad}}</td>
                        <td class="text-center nopadding">{{round($product->precio,2) ." "."$"}}</td>
                        <td class="text-center nopadding">{{round($product->precio_total_dolares,2)." "."$"}}</td>
                        <td class="text-center nopadding">{{round($product->precio_bolivares,2)." "."Bs"}}</td>
                        <td class="text-center nopadding">{{round($product->precio_total_bolivares,2)." "."Bs"}}</td>




                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</body>


</html>
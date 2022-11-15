# API REST Para El Recurso De Una Libreria #

    API REST para el manejo de CRUD diseñada para el manejo de los libros que posee una libreria

-> Importar La Base De Datos:

    Importarla desde phpMyAdmin -> database/libreria.sql

-> Detalles de la Base de Datos:

    la misma  posee tres tablas :

    *admin: Tabla en la cual se encuentran todas los usuarios que administran la pagina(por ahora solo esta cargado un usuario).

    *type: Tabla de la relacion 1 n en este caso type seria el 1 en el cual se guarda el typo de libro y el pasillo en que se encuentra.

    *article: Tabla que representa la n en la relacion, en la que se guardan todos los datos de un libro el nombre, el tipo(expresado como el id de la tabla type),autor, precio y la descripcion.

-> Detalles del trabajo:

    El tp se realizo con la idea de hacer un client side rendering con un servicio web API REST que adiferencia con el primer tp solo se pueda modificar la trabaja article de la base de datos y no la de type a modo de prueba ya que en el primer tp que se hizo un server side rendering en la cual se podrian modificar ambas tablas.

    Este mismo tambien tiene el detalle de controlar todos los parametro que le llegan y que no le llegan y realizar una respuesta dependiento cada variable de posibilidades que pueda ocurrir.

-> Consumir la API REST utilizando Postman:

    El endpoint de la API es: http://localhost/WEB2/tp2%20especial%20web2/api/book


-> Endpoints De Cada Acción:

<<GET>>

    Para mostrar todos los libros disponibles: http://localhost/WEB2/tp2%20especial%20web2/api/book

<<PAGINACIÓN>>

    Mostrar los libros con paginación:  http://localhost/WEB2/tp2%20especial%20web2/api/book?page= (numero entero)

    Aclaracion: cada pagina muestra de 10 libros a la vez por lo que si no hay suficientes libros y pasas a otra pagina te devolvera un arreglo vacio

<<GET ORDENADO>>
    
    Estas variables son utilizadas al momento de usar el filtrado o el ordenamiento de los libros:

    sortby -> Campo por el cual se va ordenar la colección.
    order -> Orden que va a tener la colección con el sortby elegido.
    section -> El campo que se va a filtrar.
    element -> El valor del campo que se quiere filtrar.
    page -> Numero de la página en la que se encuentra.
    Esta prestrabecido que si no se le asigna ningun campo te lo devuelva ordenado por: sortby: "id_article" y orden: "ascendente";

    Pero tenemos otras maneras de traer los libros jugando con las variables anteriormente nombradas, a continuacion se muestran la mayoria de las convinaciones posibles:

    Mostrar una colección filtrada por alguno de sus campos -> http://localhost/WEB2/tp2%20especial%20web2/api/book?section=(campo)&element=(contenido)

    Mostrar una colección que se pueda ordenar por cualquier campo -> http://localhost/WEB2/tp2%20especial%20web2/api/book?sortby=(campo)&order=(asc-desc)

    Ordenar una colección sin especificar el orden -> http://localhost/WEB2/tp2%20especial%20web2/api/book?sortby=(campo) 

    Ordenar una colección sin especificar el campo -> http://localhost/WEB2/tp2%20especial%20web2/api/book?order=(asc-desc)

    Filtrar, ordenar y paginar combinados -> http://localhost/WEB2/tp2%20especial%20web2/api/book?section=(campo)&element=(contenido)&sortby=(campo)&order=(asc-desc)&page=(numero entero)

    Filtrar, elegir campo y no poner el order (por defecto es ascendente) -> http://localhost/WEB2/tp2%20especial%20web2/api/book?section=(campo)&element=(contenido)&sortby=(campo)

    Filtrar, elegir el orden y no poner el campo (por defecto es id_pelicula) -> http://localhost/WEB2/tp2%20especial%20web2/api/book?section=(campo)&value=(contenido)&order=(asc-desc)

    

    Si alguna variable se le puso algo que no existe y/o no existe esa variable se van a mostrar las cosas por default


<<GET TOKEN>>
    
    Obtener el token de autenticación -> http://localhost/WEB2/tp2%20especial%20web2/api/auth/token -> Aclaración: Al logearnos incorrectamente obtendremos el token el status code será "401 Unauthorized".

    Si cualquiera de estas solicitudes sale bien, el status code será "200 OK", de lo contrario será "400 Bad Request" (Salvo en la autenticación).

    
<<GET (por ID)>>

    Para obtener de la base de datos un libro especifico, se necesita tener la ID del mismo.

    Mostrar una película con cierto id -> http://localhost/WEB2/tp2%20especial%20web2/api/book/:ID(del libro)
    

<<POST>>
    
    Para agragar un nuevo libro a la libreria es necesario primero logearse

    Agregar un nuevo libro -> http://localhost/WEB2/tp2%20especial%20web2/api/book 
 
    Aclaración: Es necesario llenar todos los campos para agregar un libro, estos son: nombre_libro,id_type,autor,precio y descripcion.
    
     Si no se llenan todos los campos, el status code será "400 Bad Request", si el usuario no se encuentra logeado el status code será "401 Unauthorized".Si la solicitud sale bien, el status code sera "201 Created", de lo contrario.

<<PUT>>
    
    Para editar un libro es necesario primero logearse

    Editar un libro -> http://localhost/WEB2/tp2%20especial%20web2/api/book/:ID(del libro)
    
    Aclaración: Se puede editar cualquiera de los campos mencionados en el método POST.
    
     No se puede dejar ninguno de esos campos vacíos, de lo contrario el status code será "400 Bad Request", si se intenta editar una pelicula en la que cuya id no exista, el status code será "404 Not found", y si el usuario no se encuentra logeado el status code será "401 Unauthorized".Si la solicitud sale bien, el status code sera "200 OK", de lo contrario, será "400 Bad Request".

<<DELETE>>
    
    Para borrar/vender un libro de la base de datos primero hay que estar logueado

    Borrar una película -> http://localhost/WEB2/tp2%20especial%20web2/api/book/:ID(del libro)
    
    Aclaración: Si se intenta borrar/vender un libro cuya id no exista, el status code será "404 Not found". Si la solicitud sale bien, el status code sera "200 OK".
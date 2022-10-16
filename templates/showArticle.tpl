{include file="header.tpl"}

<div>
  <div>
  <p>{$article->nombre_libro}</p>
  <p>{$article->autor}</p>
  <p>${$article->precio}</p>
  <p>{$article->description}</p>
  </div>
  <a href="beginning"><button>Volver</button></a>
</div>


{include file="footer.tpl"}
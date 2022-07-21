<?php
function listaPasta($path){
  
  //  Precisa ser ajustado para que quando o serviço for acessado sem o parâmetro caminhoEscolhido na URL ele não dê erros de PHP.
  //  $URL=$_SERVER['REQUEST_URI'];
  //  if($URL=="/"){
  //      $caminhoEscolhido="/?caminhoEscolhido=";
  //  } else {
  //      $caminhoEscolhido=$_GET['caminhoEscolhido'];
  //  }

  $caminhoEscolhido=$_GET['caminhoEscolhido'];


    $dir = new DirectoryIterator( "$path" );
    $diretoriosPermitidos = array("albuns");
    foreach($dir as $file)
    {
        // verifica se $file é diferente de '.' ou '..'
        if (!$file->isDot())
        {
            // listando somente os diretórios
            if  ( $file->isDir() )
            {
                // atribui o nome do diretório a variável
                $dirName = $file->getFilename();

                // listando somente o diretório permitido
                if( in_array($dirName, $diretoriosPermitidos)) {
                    // subdiretórios
                    $caminho = $file->getPathname();
                    // chamada da função de recursividade
                    listaPasta($caminho);
                }
                echo "<a href='/?caminhoEscolhido=$caminhoEscolhido/$dirName' class='saida'>$dirName</a><br>";
            }

            // listando somente os arquivos do diretório
            if (is_file($file)){
            
                // atribui o nome do arquivo a variável
                $fileName = $file->getFilename();
                //
                echo "<a href='$caminhoEscolhido/$fileName' class='saida'>$fileName</a><br>";
            }
        }
    }
}
?>
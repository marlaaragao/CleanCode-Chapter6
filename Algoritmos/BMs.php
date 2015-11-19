class BM {
	function bmh() {

        $i = 0;
        $j = 0;
        $k = 0;
        $texto = 'testeteste';
        $padrao = 'teste';
        $m = strlen($padrao);
        $n = strlen($texto);
        $pular = array();
        $tamanho_alfabeto = 28;
        
        for ($k = 0; $k < $tamanho_alfabeto; $k++) {
            $pular[$k] = $m;
        }
        for ($k = 1; $k < $m; $k++) {
            $pular[$padrao[$k - 1]] = $m - $k;
        }
        
        $i = $m;
        
        while ($i <= $n) {
            $k = $i;
            $j = $m;
            while($j > 0 && $texto[$k - 1] == $padrao[$j - 1]) {
                $k--;
                $j--;
            }
            if ($j == 0) {
                echo 'Casamento na posição: ' . ($k) . '<br>';                
            }
            $i += $pular[$texto[$i - 1]];
        }    
    }
    
    
    function bmhs() {

        $i = 0;
        $j = 0;
        $k = 0;
        $texto = 'testeteste';
        $padrao = 'teste';
        $m = strlen($padrao);
        $n = strlen($texto);
        $pular = array();
        $tamanho_alfabeto = 28;
        
        for ($k = 0; $k < $tamanho_alfabeto; $k++) {
            $pular[$k] = $m + 1;
        }
        for ($k = 1; $k <= $m; $k++) {
            $pular[$padrao[$k - 1]] = $m - $k + 1;
        }
        
        $i = $m;
        
        while ($i <= $n) {
            $k = $i;
            $j = $m;
            while($j > 0 && $texto[$k - 1] == $padrao[$j - 1]) {
                $k--;
                $j--;
            }
            if ($j == 0) {
                echo 'Casamento na posição: ' . ($k) . '<br>';                
            }
            $i += $pular[$texto[$i]];
        }    
    }


}
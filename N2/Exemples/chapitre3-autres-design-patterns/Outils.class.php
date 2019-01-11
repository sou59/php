<?php

class Outils
{
    public static $run_in_eclipse = false;
    public static $eclipse_charset = 'UTF-8';
    
    private static $out_charset;
    private static $out_handle;
    
    /**
     * Determine si la chaîne de caractères haystack commence par
     * needle.
     * @param string $haystack
     *            La chaîne dans laquelle on doit chercher.
     * @param string $needle
     *            La chaîne recherchée.
     * @return boolean
     */
    public static function str_start_with($haystack, $needle)
    {
        return ($needle === '') ||
                (strpos($haystack, $needle) === 0);
    }
    
    public static function readln($prompt = '')
    {
        if (PHP_OS == 'WINNT')
        {
            Outils::prt($prompt);
            $handle = fopen("php://stdin", "r");
            $line = stream_get_line($handle, 1024, PHP_EOL);
            Outils::detectCharset();
            if (Outils::$out_charset != 'UTF-8') {
             $line = iconv(Outils::$out_charset, 'UTF-8', $line);
            }
            fclose($handle);
        }
        else
        {
            $line = readline($prompt);
        }
        return $line;
    }

    public static function prt($str = '')
    {
        if ($str != '')
        {   
            Outils::detectCharset();
                        
            $str = str_replace("\r", '', $str);
            $str = str_replace("\n", PHP_EOL, $str);
            
            if (Outils::$out_charset != 'UTF-8') {
               $str = iconv('UTF-8', Outils::$out_charset, $str);
            }

            if (!isset(Outils::$out_handle)) {
                Outils::$out_handle = fopen("php://stdout", "w");
            }
            
            fprintf(Outils::$out_handle, $str);
            fflush(Outils::$out_handle);
        }
    }

    public static function println($str = '')
    {
        Outils::prt($str . "\n");
    }
    
    private static function detectCharset() {
        if (!isset(Outils::$out_charset)) {
            if (Outils::$run_in_eclipse) {
                Outils::$out_charset = Outils::$eclipse_charset;
            } else {
                if (PHP_OS == 'WINNT') {
                    // L'encodage CP850 est utilisé la plus part
                    // du temps. Nous allons donc l'utiliser par 
                    // défaut (si la detection ne fonctionne pas)
                    Outils::$out_charset = 'CP850';
                    exec('chcp', $output);
                    $pos = stripos($output[0], ':');
                    $cp = trim(substr($output[0], $pos + 1));
                    if ($cp < 2000) {
                        Outils::$out_charset = 'CP' . $cp;
                    }
                } else {
                    // Sous Unix, il est possible d'avoir
                    // plusieurs jeux de caractère différents
                    $locale = setlocale(LC_CTYPE, 0);
                    Outils::$out_charset = substr($locale, 6);
                    if (empty(Outils::$out_charset)) {
                        Outils::$out_charset = 'ISO-8859-1';
                    } else {
                        switch(Outils::$out_charset) {
                        	case 'euro':
                        	    Outils::$out_charset =
                                       'ISO-8859-15';
                        	    break;
                        }
                    }
                }
                // Demande à iconv d'ignorer les caractères non 
                // supportés par le jeu de caractère de sortie
                Outils::$out_charset .= '//TRANSLIT';
            }
        }
    }
}


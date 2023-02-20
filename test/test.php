<?php
    class Validator
    {
        public function checkAmount($cardNumber) {
            $value = str_split($cardNumber);
            $sum = 0;
            if (count($value) % 2) {
                for ($i = 1; $i < count($value); $i++) {
                    if ((($i + 1) % 2) == 0) {
                        $ch = $value[$i] * 2;
                        if ($ch > 9){
                            $ch -= 9;
                        }
                    }
                    $sum += $ch;
                }
            } 
            if ((count($value) % 2) != 0) {
                for ($i = 1; $i < count($value); $i++) {
                    if ((($i + 1) % 2) != 0) {
                        $ch = $value[$i] * 2;
                        if ($ch > 9){
                            $ch -= 9;
                        }
                    }
                    $sum += $ch;
                }
            }
            return (($sum % 10) == 0) ? 'валидная' : 'невалидная';
        }

        public function getIssuer($cardNumber) {
            if (preg_match("/^(5[1-5]|62|67)/", $cardNumber)) {
                return 'MasterCard';
            }
            if (preg_match("/^(4[0-9]|14)/", $cardNumber)) {
                return 'VISA';
            }
            return 'название эмитента не определено';
        }
        public function validate($cardNumber) {
            $card = str_replace(' ', '', $cardNumber);
            $validateCard = $this->checkAmount($card);
            $issuer = $this->getIssuer($card);
            return  "Валидность : $validateCard, Эминент : $issuer";
        }
    }
    $a = (int) $_SERVER['QUERY_STRING'];
    $validatetionCard = new Validator();
    echo $validatetionCard->validate($a);
?>

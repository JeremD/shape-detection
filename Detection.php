<?php
/**
 * User: jerem
 * Date: 14/03/2018
 */

include_once 'JSONParser.php';

class Detection {
    private $rightAnglesNb;
    private $parallelSidesNb;
    private $sidesNb;
    private $identicalSidesNb;
    private static $SHAPES = [
        "trq"   => "Ceci est un triangle quelconque",
        "trr"   => "Ceci est un triangle rectangle",
        "tri"   => "Ceci est un triangle isocèle",
        "trri"  => "Ceci est un triangle rectangle isocèle",
        "tre"   => "Ceci est un triangle équilatérale",
        "quq"   => "Ceci est un quadrilatère quelconque",
        "tra"   => "Ceci est un trapèze",
        "par"   => "Ceci est un parallélogramme",
        "los"   => "Ceci est un losange",
        "rec"   => "Ceci est un rectangle",
        "car"   => "Ceci est un carré",
        "peq"   => "Ceci est un pentagone quelconque",
        "per"   => "Ceci est un pentagone équilatérale",
        "err"   => "Ceci est une forme incohérente"
    ];

    /**
     * Detection constructor.
     */
    public function __construct($inputs, $url) {
        #TODO
        $json = file_get_contents($url);

        $jsonParser = new JSONParser($json);
        #TODO
        if(is_null($inputs) || sizeof($inputs) === 0) {
            throw new Exception("The size of the input array was wrongly initialized!");
        } else {
            $this->input_nb = sizeof($inputs[0]->getDigitalDisplay());
            $this->weights = array();
            $this->deltas = array();
        }
    }

    public function initWeights() {
        for($i=0; $i < $this->input_nb; $i++) {
            $this->weights[$i] = rand(-1000, 1000);
        }
    }

    public function aggregate($inputs) {
        $this->output = 0;

        if(sizeof($inputs) != sizeof($this->weights)) {
            throw new Exception("The size of the input array is different from the weight array!");
        } else {
            foreach($inputs as $key => $value) {
                $this->inputs[$key] = $value;
                $this->output += $value * $this->weights[$key];
            }
        }
    }

    /**
     * @return mixed
     */
    public function getInputs()
    {
        return $this->inputs;
    }

    /**
     * @param mixed $inputs
     */
    public function setInputs($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @return mixed
     */
    public function getInputNb()
    {
        return $this->input_nb;
    }

    /**
     * @param mixed $input_nb
     */
    public function setInputNb($input_nb)
    {
        $this->input_nb = $input_nb;
    }

    /**
     * @return array
     */
    public function getDeltas()
    {
        return $this->deltas;
    }

    /**
     * @param array $deltas
     */
    public function setDeltas(array $deltas)
    {
        $this->deltas = $deltas;
    }

    /**
     * @return array
     */
    public function getWeights()
    {
        return $this->weights;
    }

    /**
     * @param array $weights
     */
    public function setWeights($weights)
    {
        $this->weights = $weights;
    }
    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param mixed $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }
}

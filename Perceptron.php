<?php
/**
 * User: momomo
 * Date: 05/12/2017
 */

class Perceptron
{
    private $neurons_nb;
    private $training;
    private $neurons;
    private $digits;

    /**
     * Neuron constructor.
     * @param $neurons_nb
     * @param $jsonDigits
     */
    public function __construct($neurons_nb, $iteration_nb, $json_digits)
    {
        $this->iteration_nb = $iteration_nb;
        $this->neurons_nb = $neurons_nb;
        $this->neurons = array();
        $this->digits = array();
        $this->parseJsonDigits($json_digits);
        for ($i = 0; $i < $this->neurons_nb; $i++) {
            $this->neurons[$i] = new Neuron($this->digits);
            $this->neurons[$i]->initWeights();
            $this->neurons[$i]->initDeltas();
        }
        $this->training = new Training($this->neurons, array_keys($this->digits));
    }

    /**
     * @param $json_digits
     */
    private function parseJsonDigits($json_digits) {
        $json_source = file_get_contents($json_digits);
        $json_digits = json_decode($json_source);

        foreach($json_digits as $key => $json_digit) {
            $this->digits[$key] = new Digit($json_digit);
        }
    }

    public function train() {
        return $this->training->learn($this->iteration_nb, $this->digits);
    }

    public function run($input_value) {
        $binary_result = array();

        $values = $this->decimalToDigitalDisplayConvert($input_value);
        foreach($this->neurons as $neuron) {
            $neuron->aggregate($values);
            $neuron->doHeavyside();
            array_push($binary_result, $neuron->getOutput());
        }
        return $this->binaryToDecimalConvert($binary_result);
    }

    public function decimalToDigitalDisplayConvert($input_value) {
        return $this->digits[$input_value]->getDigitalDisplay();
//        switch ($input_value) {
//            case "0";
//                return [1,1,1,1,0,1,1,0,1,1,0,1,1,1,1];
//            case "1";
//                return [0,1,0,0,1,0,0,1,0,0,1,0,0,1,0];
//            case "2";
//                return [1,1,1,0,0,1,1,1,1,1,0,0,1,1,1];
//            case "3";
//                return [1,1,1,0,0,1,1,1,1,0,0,1,1,1,1];
//            case "4";
//                return [1,0,1,1,0,1,1,1,1,0,0,1,0,0,1];
//            case "5";
//                return [1,1,1,1,0,0,1,1,1,0,0,1,1,1,1];
//            case "6";
//                return [1,1,1,1,0,0,1,1,1,1,0,1,1,1,1];
//            case "7";
//                return [1,1,1,0,0,1,0,0,1,0,0,1,0,0,1];
//            default:
//                throw new \Exception("The inputs do have unrecognized values!");
//        }
    }

    public function binaryToDecimalConvert($binary_result) {
        $binary_string = implode($binary_result);
        switch($binary_string) {
            case "000";
                return "0";
            case "100";
                return "1";
            case "010";
                return "2";
            case "110";
                return "3";
            case "001";
                return "4";
            case "101";
                return "5";
            case "011";
                return "6";
            case "111";
                return "7";
            default:
                throw new Exception("The inputs do have unrecognized values!");
        }
    }

    /**
     * @return mixed
     */
    public function getIterationNb()
    {
        return $this->iteration_nb;
    }

    /**
     * @param mixed $iteration_nb
     */
    public function setIterationNb($iteration_nb)
    {
        $this->iteration_nb = $iteration_nb;
    }

    /**
     * @return int
     */
    public function getNeuronsNb()
    {
        return $this->neurons_nb;
    }

    /**
     * @param int $neurons_nb
     */
    public function setNeuronsNb($neurons_nb)
    {
        $this->neurons_nb = $neurons_nb;
    }

    /**
     * @return array
     */
    public function getNeurons()
    {
        return $this->neurons;
    }

    /**
     * @param array $neurons
     */
    public function setNeurons($neurons)
    {
        $this->neurons = $neurons;
    }

    /**
     * @return Training
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * @param Training $training
     */
    public function setTraining($training)
    {
        $this->training = $training;
    }

    /**
     * @return array
     */
    public function getDigits()
    {
        return $this->digits;
    }

    /**
     * @param array $digits
     */
    public function setDigits($digits)
    {
        $this->digits = $digits;
    }
}
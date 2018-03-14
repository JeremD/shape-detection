<?php
/**
 * User: momomo
 * Date: 05/12/2017
 */

class Neuron {
    private $deltas;
    private $output;
    private $inputs;
    private $weights;
    private $input_nb;

    /**
     * Neuron constructor.
     */
    public function __construct($inputs) {
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

    public function initDeltas() {
        foreach($this->weights as $key => $weights) {
            $this->deltas[$key] = 0;
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

    public function doHeavyside() {
        if($this->output < 0) {
            $this->output = 0;
        } else {
            $this->output = 1;
        }
    }

    public function processDeltas($expected_value, $learning_rate) {
        if($this->output !== $expected_value) {
            $error = $expected_value - $this->output;
            foreach($this->weights as $key => $weight) {
                $this->deltas[$key] += $learning_rate * $error * $this->inputs[$key];
            }
        }
    }

    public function processWeights() {
        if(sizeof($this->weights) !== sizeof($this->deltas)) {
            throw new Exception("The size of the weight delta array is different from the weight array!");
        } else {
            foreach($this->weights as $key => $weight) {
                $this->weights[$key] += $this->deltas[$key];
            }
        }
    }

    /**
     * @param int $value
     */
    public function updateWeight($key, $value) {
        $this->weights[$key] = $value;
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
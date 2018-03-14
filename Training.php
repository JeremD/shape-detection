<?php
/**
 * User: momomo
 * Date: 14/02/2018
 */

class Training {
    private $expected_values;
    private $obtained_values;
    private $previous_deltas;
    private $learning_rate;
    private $samples;
    private $neurons;

    /**
     * Constructor.
     */
    public function __construct($neurons, $expected_values) {
        $this->neurons = array();
        foreach($neurons as $neuron) {
            array_push($this->neurons, $neuron);
        }
        $this->expected_values = $expected_values;
        $this->samples = array();
        $this->obtained_values = array();
        $this->previous_deltas = array();
        $this->learning_rate = 5;
    }

    public function learn($iteration_nb, $samples) {
        $saved_weights = array();
        $this->samples = $samples;

        for($i = 0; $i < $iteration_nb; $i++) {
            foreach ($this->samples as $key => $sample) {
                $expected_values = $this->decimalToBinaryConvert($this->expected_values[$key]);
                foreach ($this->neurons as $key_neuron => $neuron) {
                    $neuron->aggregate($sample->getDigitalDisplay());
                    $neuron->doHeavyside();
                    $neuron->processDeltas($expected_values[$key_neuron], $this->learning_rate);
                    $this->learning_rate = $this->decreaseLearningRate();
                }
            }
            $saved_weights["weights"] = array();
            foreach ($this->neurons as $neuron) {
                $neuron->processWeights();
                array_push($saved_weights["weights"], $neuron->getWeights());
            }
        }

        return $saved_weights;
    }

    public function decreaseLearningRate() {
        return $this->learning_rate *= 0.99;
    }

    public function decimalToBinaryConvert($decimalNumber) {
        switch($decimalNumber) {
            case "0";
                return array(0, 0, 0);
            case "1";
                return array(1, 0, 0);
            case "2";
                return array(0, 1, 0);
            case "3";
                return array(1, 1, 0);
            case "4";
                return array(0, 0, 1);
            case "5";
                return array(1, 0, 1);
            case "6";
                return array(0, 1, 1);
            case "7";
                return array(1, 1, 1);
            default:
                throw new Exception("The inputs do have unrecognized values!");
        }
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
    public function setNeurons(array $neurons)
    {
        $this->neurons = $neurons;
    }

    /**
     * @return array
     */
    public function getSamples()
    {
        return $this->samples;
    }

    /**
     * @param array $samples
     */
    public function setSamples($samples)
    {
        $this->samples = $samples;
    }

    /**
     * @return array
     */
    public function getExpectedValues()
    {
        return $this->expected_values;
    }

    /**
     * @param array $expected_values
     */
    public function setExpectedValues($expected_values)
    {
        $this->expected_values = $expected_values;
    }

    /**
     * @return array
     */
    public function getObtainedValues()
    {
        return $this->obtained_values;
    }

    /**
     * @param array $obtained_values
     */
    public function setObtainedValues($obtained_values)
    {
        $this->obtained_values = $obtained_values;
    }

    /**
     * @return array
     */
    public function getPreviousDeltas()
    {
        return $this->previous_deltas;
    }

    /**
     * @param array $previous_deltas
     */
    public function setPreviousDeltas($previous_deltas)
    {
        $this->previous_deltas = $previous_deltas;
    }

    /**
     * @return mixed
     */
    public function getLearningRate()
    {
        return $this->learning_rate;
    }

    /**
     * @param mixed $learning_rate
     */
    public function setLearningRate($learning_rate)
    {
        $this->learning_rate = $learning_rate;
    }
}
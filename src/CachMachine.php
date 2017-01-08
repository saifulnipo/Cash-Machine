<?php
/**
 * Class CachMachine
 */
class CachMachine
{
    /**
     * @var array
     */
    private $availableNotes = array(100, 50, 20, 10);

    /**
     * Deliver note
     * @param int $amount
     * @return array
     * @throws Exception
     */
    public function deliverNote($amount)
    {
        $notes = array();

        if (!isset($amount)) {
            return $notes;
        }

        if ($amount < 0) {
            throw new InvalidArgumentException();
        }

        while ($amount > 0) {
            foreach ($this->availableNotes as $note) {
                if ($amount - $note >= 0) {
                    $notes[] = $note;
                    $amount -= $note;
                    break;
                }
            }

            if (0 !== $amount && $amount < min($this->availableNotes)) {
                throw new Exception('NoteUnavailableException');
            }
        }

        return $notes;
    }
}
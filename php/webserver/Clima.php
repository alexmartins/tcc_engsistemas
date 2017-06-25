<?php
class Clima
{
  /**
   *
   * @param integer|string $cep
   * @return string
   */
  public function previsao($cep)
  {
    $cep = (int) $cep;
    $tempo = 'tempestade';

    if ($cep % 2 == 0)
      $tempo = 'sol';

    if ($cep % 3 == 0)
      $tempo = 'chuva';

    if ($cep % 5 == 0)
      $tempo = 'nublado';

    if ($cep % 7 == 0)
      $tempo = 'nevoeiro';
    return $tempo;
  }
}
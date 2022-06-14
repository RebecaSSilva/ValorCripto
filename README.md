Pacote para buscar preço de criptomoeda, valor de mercado, ativos etc. usando terminais de API coincap. Este pacote foi desenvolvido para funcionar com a API coincap, que possui uma ferramenta útil para preços em tempo real e atividade de mercado para mais de 1.000 criptomoedas. Ao coletar dados de câmbio de milhares de mercados, também oferece dados transparentes e precisos sobre preço e disponibilidade de ativos.

Para todos os endpoints, uma única página oferece 100 respostas por padrão e suporta até 2.000 respostas por página mediante solicitações.

Com este pacote, você não precisa se preocupar em se conectar aos endpoints, isso já foi feito pela classe de fachadas do pacote. Para obter a resposta dos enpoints, basta usar a classe de fachada relacionada que produzirá a resposta no formato json.

Instalação

Execute este comando do compositor para instalar o pacote:
composer require wisdom-diala/cryptocap-pkg

Depois de instalar adicione o provedor e o aliase em config/app.php

// Provider 
WisdomDiala\Cryptocap\Providers\CryptocapServiceProvider::class,
// Aliase
'Cryptocap' => WisdomDiala\Cryptocap\Facades\Cryptocap::class,

Abaixo estão as fachadas que você pode usar para buscar os dados correspondentes que você pode precisar da API coincap.

Ativos
O preço do ativo é uma média ponderada por volume calculada pela coleta de dados de ticker das bolsas. Cada bolsa contribui para esse preço em relação ao seu volume, o que significa que as bolsas de maior volume afetam mais esse preço global. Todos os valores são convertidos em USD (dólar dos Estados Unidos) e podem ser convertidos em outras unidades de medida através do terminal /rates:

Cryptocap::getAssets();

Resposta:
{
  "data": [
    {
      "id": "bitcoin",
      "rank": "1",
      "symbol": "BTC",
      "name": "Bitcoin",
      "supply": "17193925.0000000000000000",
      "maxSupply": "21000000.0000000000000000",
      "marketCapUsd": "119150835874.4699281625807300",
      "volumeUsd24Hr": "2927959461.1750323310959460",
      "priceUsd": "6929.8217756835584756",
      "changePercent24Hr": "-0.8101417214350335",
      "vwap24Hr": "7175.0663247679233209"
    },
    {
      "id": "ethereum",
      "rank": "2",
      "symbol": "ETH",
      "name": "Ethereum",
      "supply": "101160540.0000000000000000",
      "maxSupply": null,
      "marketCapUsd": "40967739219.6612727047843840",
      "volumeUsd24Hr": "1026669440.6451482672850841",
      "priceUsd": "404.9774667045200896",
      "changePercent24Hr": "-0.0999626159535347",
      "vwap24Hr": "415.3288028454417241"
    },
   ]
 } 
 
 Link do documento Coincap para ativos: https://docs.coincap.io/#89deffa0-ab03-4e0a-8d92-637a857d2c91
 
 Limitar Ativos
Isso permite limitar o número de resultados que você obtém por solicitação:
Cryptocap::getAssetsWithLimit(5);

Ativo único
Isso permite que você busque um único recurso usando o ID do recurso:
Cryptocap::getSingleAsset('ethereum');

Histórico de recursos:
Cryptocap::getAssetHistory('ethereum', 'h2');

O primeiro parâmetro é o id da criptomoeda e o segundo parâmetro é o intervalo pontual. os intervalos de minuto e hora representam o preço naquele momento, o intervalo do dia representa a média de períodos de 24 horas (fuso horário: UTC) Link do histórico de ativos da Coincap: https://docs.coincap.io/#61e708a8-8876-4fb2-a418-86f12f308978 :
Cryptocap::getAssetMarket($id = 'ethereum', $limit = 5);

Mercados de ativos:
Cryptocap::getAssetMarket($id = 'ethereum', $limit = 5);

Cotações:
Cryptocap::getRates();
Coincap taxas doc link: https://docs.coincap.io/#2a87f3d4-f61f-42d3-97e0-3a9afa41c73b

Tarifa Única:
Cryptocap::getSingleRate('bulgarian-lev');

Trocas:
Cryptocap::getExchanges();

Link do documento de trocas Coincap: https://docs.coincap.io/#e1c56fd0-d57a-40dd-8a24-4b0883b58cfb


Você pode obter a documentação completa e a explicação bem detalhada dos parâmetros usados ​​na fachada no link abaixo. https://docs.coincap.io/#ee30bea9-bb6b-469d-958a-d3e35d442d7a

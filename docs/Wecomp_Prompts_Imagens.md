# Prompts de referência — fotografia editorial Wecomp

Documento para gerar novas imagens no mesmo sistema visual do protótipo. Copiar o **bloco mestre** no início de cada prompt e completar só o **sujeito + cenário**. As imagens atuais em `docs/img/` foram produzidas com esta fórmula.

**Uso:** fotografia gerada para prototipagem e ritmo visual. Antes do lançamento, substituir por fotografia real de instalações e equipas da Wecomp.

---

## 1. Bloco mestre (colar sempre)

```
Editorial corporate photography. Professional, serious, high-end B2B security and engineering look. Realistic photography, sharp detail, shallow depth of field where it helps the subject.

People: primarily Black African adults (Angola / Southern Africa), professional, dignified, competent. Navy technical uniforms or appropriate workwear. Hard hats and high-visibility gear only when the setting requires it.

Colour grading: cool navy blue (#0A1F3B) ambient, teal/cyan (#1AA398) as secondary light or equipment accent, warm orange/coral (#F2611D) only as a small safety or LED accent — never as a wash over the whole image.

No text, no logos, no watermarks, no readable signage, no brand names, no license plates, no readable documents or screens. No cartoon, no CGI look, no stock-photo smiles, no posed handshake.
```

### Proibições (repetir no fim do prompt)

```
No text, no logos, no watermarks, no readable brand signage.
```

### Rácios

| Uso no site | Rácio | Notas |
|---|---|---|
| Hero de página, faixa (`band`) | `16:9` | Sujeito principal no **terço direito**; o terço esquerdo fica mais livre para overlay de texto. |
| Cartão, split texto+imagem, galeria | `4:3` | Enquadramento mais fechado; detalhe técnico ou pessoas. |
| Retrato de equipa / retrato ocupacional | `3:4` | Só se o layout for vertical. |
| Ícone / detalhe de produto | `1:1` | Detalhe de equipamento, não pessoas. |

### Paleta de referência

- Navy: `#061422` / `#0A1F3B`
- Teal: `#1AA398` / `#7FD9CE`
- Coral: `#F2611D` (acento pontual: LED, colete, LED de alarme)
- Papel / interiores claros: `#F4F5F1`

---

## 2. Fórmula de um prompt novo

1. Bloco mestre  
2. **Uma frase de sujeito** (quem / o quê, em que acção)  
3. **Uma frase de cenário** (onde, hora do dia, profundidade de campo)  
4. **Acento de cor** (onde entra teal ou coral)  
5. Rácio + proibições  

Exemplo preenchido:

```
[BLOCO MESTRE]

Close-up of a technician’s gloved hands testing a red fire-hose reel cabinet in a commercial stairwell. Cool daylight, teal reflection on the metal door, a small amber LED on the adjacent alarm panel.

4:3. No text, no logos, no watermarks.
```

---

## 3. Imagens já geradas (prompts originais)

Usar como âncora. Novas imagens devem parecer da mesma sessão fotográfica, não de outro stock.

### `hero-home.jpg` — 16:9

Sala de operações / hero da Home.

```
Editorial corporate photography, wide cinematic shot: a modern security operations control room at night, several large wall monitors showing CCTV grids and building floor plans, one Black African engineer in a dark navy technical uniform standing and reviewing the screens, seen from behind at three-quarter angle. Cool navy blue ambient lighting with teal cyan screen glow and a subtle warm orange accent light. Professional, serious, high-end B2B corporate look. Shallow depth of field, realistic photography, no text, no logos, no watermarks.
```

### `solucao-sci.jpg` — 4:3

SCI — instalação de deteção.

```
Editorial corporate photography: close-up of a fire safety technician's gloved hands installing a white addressable smoke detector on a modern commercial ceiling, red fire sprinkler pipework visible in the background, clean office building interior. Cool daylight with a warm orange safety accent. Realistic, sharp detail, shallow depth of field, no text, no logos, no watermarks.
```

### `solucao-eletronica.jpg` — 4:3

Segurança eletrónica — CCTV + acessos.

```
Editorial corporate photography: a modern dome CCTV security camera mounted on a ceiling in the foreground, sharply in focus, with a blurred bright commercial building lobby and a biometric access control reader beside a glass door in the background. Cool navy and teal color grading, professional B2B security aesthetic. Realistic photography, no text, no logos, no watermarks.
```

### `solucao-shst.jpg` — 4:3

SHST — retrato ocupacional.

```
Editorial corporate photography: a Black African industrial worker wearing a white hard hat, safety goggles, high-visibility orange vest and protective gloves, standing confidently in a clean modern factory or warehouse, looking towards the camera. Natural industrial lighting, cool blue-grey tones with orange high-visibility accents. Realistic, respectful, dignified portrait, shallow depth of field, no text, no logos, no watermarks.
```

### `setor-bancario.jpg` — 4:3

Setor bancário — interior de agência.

```
Editorial corporate photography: interior of a modern bank branch, clean glass and light wood counters, a Black African bank employee assisting a customer at a desk in soft focus in the background, a discreet ceiling security camera and emergency exit signage visible. Bright professional lighting, navy blue and warm neutral tones, calm and orderly atmosphere. Realistic photography, no text, no readable signage, no logos, no watermarks.
```

### `setor-retalho.jpg` — 4:3

Retalho — fluxo de público.

```
Editorial corporate photography: wide interior view of a busy modern supermarket or shopping centre concourse with shoppers walking, slight motion blur on people to convey flow, bright ceiling lighting, a security camera and illuminated emergency exit sign discreetly visible above. Clean commercial retail aesthetic, cool neutral tones. Realistic photography, no text, no readable brand signage, no logos, no watermarks.
```

### `setor-industria.jpg` — 4:3

Indústria / logística.

```
Editorial corporate photography: interior of a large modern logistics warehouse with tall racking and stacked pallets, a forklift in motion in the background, two Black African workers in hard hats and high-visibility vests reviewing a clipboard in the foreground. Industrial lighting, cool blue-grey palette with orange safety accents. Realistic photography, no text, no logos, no watermarks.
```

### `sobre-equipa.jpg` — 16:9

Sobre nós — equipa em obra.

```
Editorial corporate photography, wide shot: a team of three Black African safety engineers, two men and one woman, wearing dark navy technical uniforms and hard hats, gathered around a tablet and building floor plans on a site table, discussing and pointing at the plan. Modern building under fit-out in the background. Natural daylight, professional, collaborative and competent atmosphere, navy and teal tones. Realistic photography, no text, no logos, no watermarks.
```

### `cobertura-nacional.jpg` — 16:9

Resultados — presença no terreno.

```
Editorial corporate photography, wide shot: a technical service van parked outside a commercial building in an African city at golden hour, two Black African technicians in navy uniforms unloading equipment cases. Warm late afternoon light, palm trees and modern buildings in the background, sense of national field coverage and mobility. Realistic photography, no text, no logos, no watermarks, no license plates.
```

### `contacto-consultoria.jpg` — 4:3

Contacto — reunião B2B.

```
Editorial corporate photography: a business consulting meeting in a bright modern office, a Black African safety consultant in a navy uniform presenting a risk assessment document to two business executives in suits across a table, everyone engaged and attentive. Large window with soft daylight, professional B2B atmosphere, navy and neutral tones. Realistic photography, no text, no readable documents, no logos, no watermarks.
```

### `metodologia-hira.jpg` — 4:3

HIRA — inspeção com tablet.

```
Editorial corporate photography: a Black African safety engineer in a navy uniform and hard hat holding a tablet, performing a risk inspection walkthrough inside an industrial facility, pointing at equipment while taking notes. Machinery and pipework in soft focus behind. Cool industrial lighting with teal accents. Realistic photography, no text, no logos, no watermarks.
```

### `solucoes-integradas.jpg` — 16:9

Integração — sala técnica / bastidor.

```
Editorial corporate photography, wide shot: a fire alarm control panel and integrated security equipment rack mounted in a clean technical room, neat cable management, small status LEDs glowing green and amber, a technician's hand adjusting a setting at the edge of frame. Cool navy tones with teal and orange LED accents, high-end technical craftsmanship. Realistic photography, no text, no readable labels, no logos, no watermarks.
```

---

## 4. Próximas imagens sugeridas

Prioridade para páginas que ainda repetem a mesma fotografia no hero e no corpo.

### SCI — extinção e evacuação

**`sci-sprinklers.jpg` — 4:3**

```
[BLOCO MESTRE]

Wide interior of a commercial ceiling grid with a row of fire sprinkler heads in sharp focus, red pipework receding into a clean office floor in soft focus. Cool daylight, a single warm amber indicator on a nearby detector.

4:3. No text, no logos, no watermarks.
```

**`sci-evacuacao.jpg` — 4:3**

```
[BLOCO MESTRE]

A photoluminescent emergency exit path along a commercial corridor at dusk, emergency luminaires glowing teal-white, a discreet fire alarm call point on the wall. Calm, empty, ordered — not a panic scene. Cool navy shadows, teal light.

4:3. No text, no logos, no readable signage, no watermarks.
```

**`sci-central.jpg` — 4:3**

```
[BLOCO MESTRE]

Close-up of a fire detection control panel in a clean technical cupboard, green and amber LEDs, a Black African technician’s hand on a test key at the edge of frame. Cool navy metal, teal reflections.

4:3. No text, no readable labels, no logos, no watermarks.
```

### Eletrónica — acessos e intrusão

**`eletronica-biometria.jpg` — 4:3**

```
[BLOCO MESTRE]

Close-up of a Black African professional placing a finger on a wall-mounted biometric reader next to a glass office door, a small teal status LED. Shallow depth of field, navy and glass reflections.

4:3. No text, no logos, no watermarks.
```

**`eletronica-intrusao.jpg` — 4:3**

```
[BLOCO MESTRE]

A magnetic door contact and PIR sensor on a warehouse roller shutter, night-time, teal LED standby glow, industrial concrete and steel. Serious, quiet, precise.

4:3. No text, no logos, no watermarks.
```

### SHST — EPI e primeiros socorros

**`shst-epi-detalhe.jpg` — 4:3**

```
[BLOCO MESTRE]

Still-life of certified PPE laid out on a metal workbench: white hard hat, safety glasses, gloves, high-visibility vest. Cool industrial light, orange vest as the only warm accent. No people.

4:3. No text, no logos, no watermarks.
```

**`shst-primeiros-socorros.jpg` — 4:3**

```
[BLOCO MESTRE]

A wall-mounted first-aid cabinet in a clean factory corridor, slightly open, organised contents, a Black African safety officer checking stock. Cool daylight, coral as a small cross accent only if abstract — no readable Red Cross marks or brand.

4:3. No text, no logos, no watermarks.
```

### Setores — segunda fotografia (evitar repetir o hero)

**`banca-cofre.jpg` — 4:3**

```
[BLOCO MESTRE]

A discreet access-controlled door to a bank vault area, biometric reader and CCTV dome, empty and orderly. Cool navy glass and steel, teal LED.

4:3. No text, no logos, no watermarks.
```

**`retalho-armazem-loja.jpg` — 4:3**

```
[BLOCO MESTRE]

Staff-only stockroom behind a supermarket, CCTV covering the door from public floor to reserve, a worker in a navy polo checking a delivery. Bright, clean, high-flow retail back-of-house.

4:3. No text, no logos, no readable brands, no watermarks.
```

**`industria-hospital.jpg` — 4:3**

```
[BLOCO MESTRE]

A hospital corridor in Angola, calm and clean, emergency lighting and a smoke detector on the ceiling, a nurse walking in soft focus. Respectful, no patients identifiable, no medical drama. Cool teal-white clinical light.

4:3. No text, no logos, no watermarks.
```

### Cobertura nacional — mapa vivo

**`cobertura-interior.jpg` — 16:9**

```
[BLOCO MESTRE]

Two Black African technicians in navy uniforms walking toward a mid-rise building in a secondary Angolan city (Huambo or Benguela atmosphere: laterite, modern concrete, palms), carrying equipment cases. Late afternoon, sense of travel and local response.

16:9. Leave the left third of the frame less busy for text overlay. No text, no logos, no license plates, no watermarks.
```

### Sobre — certificações / rigor (placeholder visual até haver fotos reais)

**`sobre-documentacao.jpg` — 4:3**

```
[BLOCO MESTRE]

A safety engineer’s desk: tablet, unmarked floor plan sheets, a navy hard hat, a measuring laser. No readable stamps or certificates. Cool daylight from a window.

4:3. No text, no logos, no watermarks.
```

---

## 5. Regras de composição para o site

- **Hero 16:9:** deixar o **lado esquerdo** relativamente limpo (céu, parede, ecrãs desfocados). O CSS aplica um degradé navy; se o sujeito estiver no centro, o texto tapa-o.
- **Cartões:** preferir **detalhe técnico em primeiro plano** (detetor, câmara, EPI). Rostos em cartão pequeno perdem-se.
- **Split:** a fotografia deve ter um **único ponto de foco**. Evitar grupos grandes.
- **Faixa escura (`band`):** imagens com **luz direccional** (golden hour, LEDs, ecrãs) sobrevivem ao overlay; interiores cinzentos planos desaparecem.

### Uniforme Wecomp (consistência)

Quando houver pessoas da Wecomp (não clientes):

- Uniforme **navy**, sem logótipo inventado  
- Capacete **branco** em obra / indústria  
- Colete **alta visibilidade laranja** só em armazém / estrada  
- Escritório / consultoria: navy sem capacete  

Não misturar fatos de negócio com EPI no mesmo plano, salvo reunião cliente + técnico (como em `contacto-consultoria.jpg`).

---

## 6. Como pedir no Cursor

1. Abrir este ficheiro.  
2. Copiar bloco mestre + prompt da secção 3 ou 4.  
3. Pedir geração com o rácio indicado e o nome de ficheiro (`filename: sci-sprinklers.jpg`).  
4. Guardar em `docs/img/` com o mesmo nome.  
5. Referenciar no HTML com `alt` em português descritivo (acção + contexto), sem nomes de marca.

Exemplo de pedido:

> Gera `sci-sprinklers.jpg` em 4:3 com o prompt da secção 4 deste documento, e copia o ficheiro para `docs/img/`.

---

## 7. Critério de rejeição

Descartar e regenerar se:

- aparecer **texto, logótipo ou marca** (mesmo ilegível mas óbvio)  
- o tom for **stock americano genérico** (sorrisos, aperto de mão, open-space de vidro sem contexto de segurança)  
- a paleta for **quente demais** (sepia, laranja dominante)  
- o cenário for **pânico, acidente ou fogo real** — a Wecomp comunica prevenção e engenharia, não catástrofe  
- as pessoas parecerem **figuras de fundo decorativas** em vez de profissionais a trabalhar  

---

## 8. Substituição por fotografia real (lançamento)

Quando houver fotos verdadeiras, manter:

- a mesma **grelha de nomes** (`hero-home.jpg`, `solucao-sci.jpg`, …) para não partir o HTML  
- `alt` actualizado ao que a foto mostra de facto  
- recorte 16:9 com espaço à esquerda para o hero  

Não publicar fotografia gerada como se fosse obra ou cliente Wecomp.

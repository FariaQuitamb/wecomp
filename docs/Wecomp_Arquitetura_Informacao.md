# Arquitetura de Informação — Website Wecomp

## 0. Diagnóstico crítico do material-fonte

Antes da estrutura, três problemas no portfólio que, se transpostos diretamente para o site, vão produzir uma AI fraca:

1. **Não há prova quantificável.** "100+ pontos operacionais", "21 províncias", "4 instituições bancárias" são números de cobertura, não de resultado. Não há um único dado de redução de risco, tempo de resposta a incidentes, taxa de conformidade obtida em auditoria, ou similar. Isto é um problema de conteúdo que a AI não resolve sozinha — mas a AI pode criar o *espaço* certo (página de Resultados/Casos) para forçar essa lacuna a ser preenchida antes do lançamento.
2. **Três públicos com jornadas de decisão distintas estão a ser tratados como um só.** Um responsável de compliance num banco, um gestor de instalações no retalho e um responsável de SHST na indústria não pesquisam pelas mesmas palavras nem valorizam os mesmos argumentos (o primeiro quer citação legal exata; o segundo quer continuidade operacional e SLA; o terceiro quer conformidade com a LGT e documentação de EPI). O portfólio junta tudo em "Setores que Servimos" como bloco de prova social genérico. A AI abaixo separa isto.
3. **Existe autoridade regulatória não monetizada.** A empresa demonstra domínio de Decreto 227/19, Decreto 195/11, NP 4386:2014, LGT 12/23 — isto é conteúdo de SEO e de topo de funil de altíssimo valor em Angola, onde há pouca concorrência a publicar sobre isto em português. O portfólio não tem nenhuma secção editorial. Vou propor um hub de conteúdo; se a decisão de negócio for não investir em produção de conteúdo contínuo, essa secção deve ser removida da AI — não deixada meio-vazia.

Assumo, para esta proposta, que o objetivo primário do site é **geração de leads qualificados B2B** (não e-commerce, não recrutamento). Se o objetivo for outro, a hierarquia de CTAs abaixo muda.

---

## 1. Sitemap (visão geral)

```
Home
├── Sobre Nós
│   ├── Quem Somos
│   ├── Missão, Visão e Valores
│   └── Diferenciais Competitivos
├── Soluções
│   ├── Segurança Contra Incêndios (SCI)
│   ├── Segurança Eletrónica
│   └── SHST e EPIs
├── Setores
│   ├── Setor Bancário e Financeiro
│   ├── Retalho e Distribuição
│   └── Indústria, Logística e Saúde
├── Resultados e Cobertura
│   ├── Presença Nacional (mapa interativo)
│   └── Casos de Referência
├── Recursos [condicional — ver nota acima]
│   └── Artigos sobre conformidade legal
├── Contacto
│   ├── Formulário de consultoria
│   └── Dados de contacto / localização
└── (Footer) Política de Privacidade, Termos
```

---

## 2. Estrutura detalhada por página

### 2.1 Home
Função: qualificar o visitante e encaminhá-lo em <15 segundos para "Soluções" ou "Setores", conforme entrou a pensar em produto ou a pensar em problema regulatório.

- Hero: proposta de valor + prova de escala (100+ pontos, 21 províncias) — **não** liderar com missão/visão, isso é conteúdo institucional de página interna, não de conversão.
- Bloco "Escolha por necessidade": 3 cartões (SCI / Segurança Eletrónica / SHST) → ligam a Soluções.
- Bloco "Escolha por setor": 3 cartões (Banca / Retalho / Indústria-Saúde) → ligam a Setores.
- Prova social: logótipos de clientes (Banco Sol, Millennium Atlântico, DHL, etc.) — só logótipos com autorização de uso confirmada.
- Diferenciais competitivos (versão resumida, 4 itens, sem tabela completa).
- CTA único e repetido: "Pedir consultoria estratégica" (não diluir com múltiplos CTAs concorrentes).

### 2.2 Sobre Nós
- **Quem Somos**: texto do portfólio, adaptado, mais curto.
- **Missão, Visão e Valores**: manter, mas não como página autónoma no menu principal — funciona melhor como secção dentro de "Quem Somos". Ninguém chega a um site B2B angolano à procura da declaração de missão como destino de navegação primário.
- **Diferenciais Competitivos**: manter a tabela do portfólio, mas ligar cada linha a uma prova (link para caso de referência ou certificação), senão é autoafirmação sem lastro.
- **Equipa/Certificações — em falta no material.** Para um setor onde "rigor técnico" e "conformidade legal" são o argumento central, a ausência de nomes de responsáveis técnicos, certificações profissionais ou licenças da empresa é uma lacuna de credibilidade, não estética.

### 2.3 Soluções (página-índice + 3 subpáginas)
Cada subpágina (SCI, Segurança Eletrónica, SHST) segue o mesmo template para reduzir custo de manutenção e permitir comparação:
1. O problema de negócio que resolve (não a lista de equipamento primeiro)
2. Enquadramento legal aplicável (Decreto 195/11, NP 4386:2014, LGT 12/23 — específico por solução)
3. Componentes/serviços (a lista já existente no portfólio)
4. Processo de implementação (**em falta no material** — quantas fases, prazos típicos, quem faz o levantamento)
5. CTA: "Solicitar avaliação HIRA" ou equivalente por solução

### 2.4 Setores (página-índice + 3 subpáginas)
Isto substitui o bloco genérico "Setores que Servimos" do portfólio por páginas reais de segmentação:
- **Setor Bancário**: ênfase em continuidade operacional, LGT, agências vs. sede, exemplos (Banco Sol, Millennium Atlântico, Banco Yetu, Kixicrédito — mediante autorização de citação de marca).
- **Retalho e Distribuição**: ênfase em fluxo de público, deteção de intrusão, sinistros.
- **Indústria, Logística e Saúde**: ênfase em SHST, EPI, ambientes de risco elevado.

Cada subpágina de setor cruza com as soluções relevantes (ligações cruzadas Soluções ↔ Setores), o que a estrutura atual do PDF, ao separar tudo em capítulos estanques, não permite.

### 2.5 Resultados e Cobertura
- **Presença Nacional**: mapa interativo (não estático) com filtro por província/setor. A tabela extensa do PDF (Luanda, Huambo, Cabinda...) é dado bruto — em página web deve ser pesquisável/filtrável, não uma tabela de texto corrido.
- **Casos de Referência**: **página que atualmente não pode ser preenchida com o material disponível.** Precisa de 2-4 estudos de caso reais com problema → intervenção → resultado mensurável. Sem isto, "prova social" fica reduzida a lista de logótipos, que é o nível mais fraco de prova social em B2B.

### 2.6 Recursos [decisão de negócio pendente]
Hub editorial sobre Decreto 227/19, Decreto 195/11, NP 4386:2014, LGT 12/23 — capitaliza a autoridade regulatória que a empresa já demonstra ter. Só deve entrar na v1 do site se houver compromisso de publicação contínua (mínimo mensal); uma secção de "recursos" com 2 artigos parados há um ano é pior para a credibilidade do que não a ter.

### 2.7 Contacto
- Formulário curto (nome, empresa, setor, telefone, mensagem) — o setor como campo obrigatório permite routing interno do lead.
- Dados diretos: telefone, email, morada (do portfólio).
- Sem mapa embutido do Google Maps só por ter — só se a morada for ponto de visita físico relevante para o cliente.

---

## 3. Navegação

**Menu principal (5 itens, sem mais):**
`Soluções | Setores | Sobre Nós | Resultados | Contacto`

Justificação para excluir "Recursos" do menu principal por defeito: um site B2B de segurança/conformidade não deve competir por atenção de navegação entre "comprar" e "ler" — se o hub de conteúdo for aprovado, entra como sub-item dentro de "Sobre Nós" ou como bloco de rodapé, elevando-se ao menu principal só se o tráfego orgânico justificar.

**CTA persistente no header:** "Pedir Consultoria" — único, consistente em todas as páginas, sem variação de texto.

**Rodapé:** links institucionais, contactos, redes sociais (se existirem), política de privacidade — não duplicar navegação principal.

---

## 4. Fluxos de utilizador (dois cenários mínimos a validar em prototipagem)

1. **Responsável de compliance bancário** chega via pesquisa "Decreto 227/19 segurança contra incêndio" → aterra num artigo de Recursos (ou, na ausência deste, direto na página SCI) → lê enquadramento legal → vê bloco "Setor Bancário" → CTA.
2. **Gestor de instalações no retalho**, referido por outro cliente, entra na Home → clica cartão "Escolha por setor → Retalho" → vê soluções cruzadas (Segurança Eletrónica + SCI) → CTA.

Se a prototipagem mostrar que o utilizador precisa de mais de 3 cliques para chegar ao formulário de contacto a partir de qualquer ponto de entrada, a AI falhou o critério de conversão e deve ser revista — não o formulário.

---

## 5. Decisões em aberto que a AI não resolve sozinha

- Confirmar autorização de uso de marca/logótipo de cada cliente citado (Banco Sol, Millennium Atlântico, DHL, etc.) antes de publicar.
- Decidir se "Recursos" entra na v1 (ver 2.6).
- Produzir pelo menos 2 casos de referência com métrica real antes do lançamento da página "Resultados" — sem isso, a página fica vazia ou genérica.
- Definir routing interno dos leads por setor (campo obrigatório no formulário de contacto), o que depende da estrutura comercial interna da Wecomp, não da AI.

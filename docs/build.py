# -*- coding: utf-8 -*-
"""Gerador do protótipo institucional Wecomp (header/footer partilhados)."""
from pathlib import Path

ROOT = Path("/Users/fariaquitamba/code/wecomp/docs")

HEAD = """<!DOCTYPE html>
<html lang="pt-AO">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{title} — Wecomp</title>
<meta name="description" content="{desc}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="wecomp-prototipo.css">
<script>document.documentElement.classList.add('js');</script>
</head>
<body>
"""

NAV = """<header>
  <div class="wrap nav">
    <a class="brand" href="wecomp-prototipo.html">
      <svg class="brand-mark" viewBox="0 0 40 40" fill="none">
        <circle cx="12" cy="12" r="6" fill="var(--coral-500)"/>
        <path d="M4 30 L14 12 L20 24 L26 8 L36 30" stroke="var(--teal-300)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="brand-name">Wecomp</span>
    </a>
    <button class="nav-toggle" aria-label="Abrir menu" aria-expanded="false" id="navToggle">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
    </button>
    <ul class="nav-links" id="navLinks">
      <li><a href="solucoes.html"{sol}>Soluções</a></li>
      <li><a href="setores.html"{set}>Setores</a></li>
      <li><a href="sobre.html"{sob}>Sobre Nós</a></li>
      <li><a href="resultados.html"{res}>Resultados</a></li>
      <li><a href="contacto.html"{con}>Contacto</a></li>
      <li class="mobile-cta"><a href="contacto.html">Pedir consultoria</a></li>
    </ul>
    <a class="nav-cta" href="contacto.html">Pedir consultoria</a>
  </div>
  <div class="scroll-progress" aria-hidden="true"><span></span></div>
</header>
"""

CTA = """
  <section class="final-cta">
    <!-- Camada de movimento: as três imagens em crossfade são a base sempre
         presente; o vídeo só é descarregado em ecrã largo e ligação boa
         (ver wecomp-prototipo.js). Para trocar por filmagem real, substituir
         img/cta-loop.mp4 e img/cta-loop.webm mantendo os nomes. -->
    <div class="cta-media" aria-hidden="true">
      <span class="cta-frame" style="--img:url('img/hero-home.jpg');"></span>
      <span class="cta-frame" style="--img:url('img/solucoes-integradas.jpg');"></span>
      <span class="cta-frame" style="--img:url('img/cobertura-nacional.jpg');"></span>
      <video class="cta-video" muted loop playsinline preload="none"
             poster="img/hero-home.jpg"
             data-webm="img/cta-loop.webm" data-mp4="img/cta-loop.mp4"></video>
    </div>
    <div class="cta-sheen" aria-hidden="true"></div>
    <div class="blueprint" aria-hidden="true" style="opacity:0.22;"></div>
    <div class="wrap final-cta-inner">
      <div>
        <h2>Vamos avaliar os riscos da sua operação.</h2>
        <p>Consultoria estratégica com engenharia HIRA — diagnóstico primeiro, proposta depois. Sem compromisso de compra.</p>
      </div>
      <a class="btn-primary" href="contacto.html">Pedir consultoria estratégica</a>
    </div>
  </section>
"""

FOOT = """
<footer>
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-brand">
        <span class="brand-name" style="color:#fff;">Wecomp</span>
        <p>Engenharia de segurança e conformidade legal para o crescimento do seu negócio.</p>
        <p style="margin-top:16px;">Viana Luanda Sul, Rua da Vila,<br>frente ao Hotel de Pedras</p>
      </div>
      <div>
        <h4>SOLUÇÕES</h4>
        <ul>
          <li><a href="solucao-sci.html">Segurança Contra Incêndios</a></li>
          <li><a href="solucao-eletronica.html">Segurança Eletrónica</a></li>
          <li><a href="solucao-shst.html">SHST e EPIs</a></li>
          <li><a href="solucoes.html">Todas as soluções</a></li>
        </ul>
      </div>
      <div>
        <h4>SETORES</h4>
        <ul>
          <li><a href="setor-bancario.html">Banca e finanças</a></li>
          <li><a href="setor-retalho.html">Retalho e distribuição</a></li>
          <li><a href="setor-industria.html">Indústria, logística e saúde</a></li>
          <li><a href="resultados.html">Cobertura nacional</a></li>
        </ul>
      </div>
      <div>
        <h4>EMPRESA</h4>
        <ul>
          <li><a href="sobre.html">Sobre nós</a></li>
          <li><a href="contacto.html">Contacto</a></li>
          <li><a href="privacidade.html">Política de Privacidade</a></li>
          <li><a href="termos.html">Termos</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2026 Wecomp. Todos os direitos reservados.</span>
      <span>DP 227/19 · DP 195/11 · LGT 12/23 · NP 4386:2014</span>
    </div>
  </div>
</footer>
<script src="wecomp-prototipo.js"></script>
</body>
</html>
"""


def nav(active=None):
    flags = {k: "" for k in ("sol", "set", "sob", "res", "con")}
    if active:
        flags[active] = ' aria-current="page"'
    return NAV.format(**flags)


def page(filename, title, desc, active, main, cta=True):
    html = HEAD.format(title=title, desc=desc) + nav(active) + f"<main>\n{main}\n</main>\n"
    if cta:
        html += CTA
    html += FOOT
    (ROOT / filename).write_text(html, encoding="utf-8")


def hero(img, crumb, eyebrow, h1, lead, ctas="", extra=""):
    crumb_html = f'<div class="crumb">{crumb}</div>' if crumb else ""
    return f"""
  <section class="hero hero-photo" style="--bg:url('img/{img}');">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="wrap hero-inner">
      <div>
        {crumb_html}
        <span class="eyebrow">{eyebrow}</span>
        <h1>{h1}</h1>
        <p class="lead">{lead}</p>
        {ctas}
      </div>
    </div>{extra}
  </section>
"""


def faq(items, title="Perguntas que nos fazem antes de avançar."):
    qs = "".join(
        f"<details><summary>{q}</summary><p>{a}</p></details>" for q, a in items
    )
    return f"""
  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">FAQ</span>
          <h2>{title}</h2>
        </div>
      </div>
      <div class="faq">{qs}</div>
    </div>
  </section>
"""


def quote(text, who):
    return f"""
      <div class="quote">
        <div>
          <blockquote>{text}</blockquote>
          <cite>{who}</cite>
        </div>
        <div class="badge">Depoimento por recolher — estrutura de exemplo (AI §5)</div>
      </div>
"""


IMG_SCI = "solucao-sci.jpg"
IMG_EL = "solucao-eletronica.jpg"
IMG_SH = "solucao-shst.jpg"


# ---------------------------------------------------------------- HOME
page(
    "wecomp-prototipo.html",
    "Engenharia de Segurança e Conformidade Legal",
    "Engenharia de riscos, segurança contra incêndios, segurança eletrónica e SHST em conformidade com a legislação angolana. 100+ pontos operacionais em 21 províncias.",
    None,
    """
  <section class="hero hero-showcase" id="topo" style="--bg:url('img/hero-home.jpg');">
    <div class="hero-bg" aria-hidden="true"></div>
    <div class="wrap-wide hero-showcase-inner">
      <h1>Segurança que resiste ao escrutínio legal e à operação real.</h1>

      <div class="hero-foot">
        <ul class="hero-stats">
          <li class="hero-stat">
            <span class="hero-stat-num">100+</span>
            <span class="label">Pontos<br>operacionais</span>
          </li>
          <li class="hero-stat">
            <span class="hero-stat-num">21</span>
            <span class="label">Províncias e<br>municípios</span>
          </li>
          <li class="hero-stat">
            <span class="hero-stat-num">4</span>
            <span class="label">Instituições<br>bancárias</span>
          </li>
          <li class="hero-stat">
            <span class="hero-stat-num">30+</span>
            <span class="label">Empresas de<br>referência</span>
          </li>
        </ul>

        <div class="hero-aside">
          <p>Engenharia de riscos e conformidade com a legislação angolana — incêndio, segurança eletrónica e SHST para operações que não podem parar.</p>
          <div class="hero-ctas">
            <a class="btn-primary" href="contacto.html">Pedir consultoria</a>
            <a class="btn-ghost btn-glass" href="solucoes.html">Conhecer as soluções</a>
          </div>
        </div>
      </div>
    </div>
  </section>
"""
    + """
  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">O problema</span>
          <h2>Em Angola, falhar a conformidade custa mais do que o equipamento.</h2>
        </div>
        <p>Três riscos que aparecem repetidamente nas operações que auditamos — e que raramente estão no orçamento inicial.</p>
      </div>
      <div class="risk-grid">
        <div class="risk">
          <div class="n">RISCO 01</div>
          <h3>Sanção e interdição</h3>
          <p>Instalações sem projeto conforme o Decreto Presidencial 195/11 ficam expostas a coimas, embargos e recusa de licenciamento — normalmente descobertos na pior altura, durante uma vistoria.</p>
        </div>
        <div class="risk">
          <div class="n">RISCO 02</div>
          <h3>Paragem operacional</h3>
          <p>Uma agência fechada, uma loja evacuada ou uma linha parada custa receita por hora. Sistemas mal dimensionados falham exatamente no dia em que são necessários.</p>
        </div>
        <div class="risk">
          <div class="n">RISCO 03</div>
          <h3>Responsabilidade laboral</h3>
          <p>A Lei Geral do Trabalho 12/23 responsabiliza o empregador pelas condições de SHST. Sem EPI documentado e sinalização adequada, o acidente torna-se também um processo.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="solucoes" style="background:#fff;">
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">01 — Escolha por necessidade</span>
          <h2>Três frentes de engenharia, um único ecossistema de segurança.</h2>
        </div>
        <p>Cada solução liga-se a um enquadramento legal específico e a um processo de implementação próprio — não vendemos equipamento isolado.</p>
      </div>
      <div class="card-grid">
        <a class="card" href="solucao-sci.html">
          <div class="thumb"><img src="img/solucao-sci.jpg" alt="Técnico a instalar detetor de fumo endereçável num teto comercial" width="1024" height="768" loading="lazy" decoding="async"></div>
          <h3>Segurança Contra Incêndios</h3>
          <p>Deteção automática, extinção fixa e engenharia de evacuação, projetadas como ecossistema — não como itens avulsos.</p>
          <div class="legal-ref">DP 195/11 · NP 4386:2014</div>
          <span class="goto">Ver solução →</span>
        </a>
        <a class="card" href="solucao-eletronica.html">
          <div class="thumb"><img src="img/solucao-eletronica.jpg" alt="Câmara de videovigilância e leitor biométrico num átrio empresarial" width="1024" height="768" loading="lazy" decoding="async"></div>
          <h3>Segurança Eletrónica</h3>
          <p>CCTV com análise de vídeo, controlo de acessos biométrico e deteção de intrusão de alta precisão.</p>
          <div class="legal-ref">Vigilância &amp; controlo de acessos</div>
          <span class="goto">Ver solução →</span>
        </a>
        <a class="card" href="solucao-shst.html">
          <div class="thumb"><img src="img/solucao-shst.jpg" alt="Trabalhador industrial com capacete, óculos e colete de alta visibilidade" width="1024" height="768" loading="lazy" decoding="async"></div>
          <h3>SHST e EPIs</h3>
          <p>Equipamento de proteção individual certificado, primeiros socorros e sinalização de saúde e segurança.</p>
          <div class="legal-ref">Lei Geral do Trabalho 12/23</div>
          <span class="goto">Ver solução →</span>
        </a>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap media-split">
      <figure class="media-figure">
        <img src="img/metodologia-hira.jpg" alt="Engenheiro de segurança a inspecionar equipamento industrial com tablet" width="1024" height="768" loading="lazy" decoding="async">
        <figcaption class="figcap">LEVANTAMENTO HIRA EM AMBIENTE INDUSTRIAL</figcaption>
      </figure>
      <div class="prose">
        <span class="section-num">02 — Metodologia</span>
        <h2 style="font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;">Primeiro medimos o risco. Só depois falamos de equipamento.</h2>
        <p>HIRA (Identificação de Perigos e Avaliação de Riscos) é uma análise técnica do local antes de qualquer proposta comercial. É o que separa um projeto de segurança de uma lista de compras.</p>
        <ul class="checklist">
          <li>Levantamento presencial das instalações e dos processos críticos</li>
          <li>Classificação do risco por probabilidade e severidade</li>
          <li>Confronto com o decreto e a norma aplicáveis à sua atividade</li>
          <li>Prioridade de investimento onde o risco é maior — e não onde a margem é maior</li>
        </ul>
        <a class="btn-ghost dark" style="margin-top:26px;" href="sobre.html">Como trabalhamos</a>
      </div>
    </div>
  </section>

  <section id="setores" class="sector-section">
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">03 — Escolha por setor</span>
          <h2>Cada indústria mede segurança de forma diferente.</h2>
        </div>
        <p>Um banco pergunta pela continuidade da agência. A indústria pergunta pela conformidade com a LGT. O retalho pergunta pelo fluxo de público.</p>
      </div>
      <div class="card-grid">
        <a class="card" href="setor-bancario.html">
          <div class="thumb"><img src="img/setor-bancario.jpg" alt="Interior de agência bancária moderna com câmara de segurança e sinalização de emergência" width="1024" height="768" loading="lazy" decoding="async"></div>
          <span class="tag">Banca &amp; finanças</span>
          <h3>Setor Bancário</h3>
          <p>Cobertura de agências, sedes e centralidades — continuidade operacional acima de tudo.</p>
          <div class="legal-ref">Banco Sol · Millennium Atlântico · Kixicrédito</div>
          <span class="goto">Ver setor →</span>
        </a>
        <a class="card" href="setor-retalho.html">
          <div class="thumb"><img src="img/setor-retalho.jpg" alt="Corredor de centro comercial com elevado fluxo de público" width="1024" height="768" loading="lazy" decoding="async"></div>
          <span class="tag">Retalho</span>
          <h3>Retalho e Distribuição</h3>
          <p>Ambientes de elevado fluxo de público, onde deteção rápida evita perdas e paragens.</p>
          <div class="legal-ref">FreshMart · LC Waikiki · Belas Shopping</div>
          <span class="goto">Ver setor →</span>
        </a>
        <a class="card" href="setor-industria.html">
          <div class="thumb"><img src="img/setor-industria.jpg" alt="Trabalhadores com EPI a verificar operações num armazém logístico" width="1024" height="768" loading="lazy" decoding="async"></div>
          <span class="tag">Indústria &amp; saúde</span>
          <h3>Indústria, Logística e Saúde</h3>
          <p>Ambientes de risco elevado onde a conformidade com a SHST é condição de operação, não opção.</p>
          <div class="legal-ref">DHL · Promasidor · Hospital D. Emílio Nascimento</div>
          <span class="goto">Ver setor →</span>
        </a>
      </div>
    </div>
  </section>

  <section class="band" style="--bg:url('img/cobertura-nacional.jpg');">
    <div class="band-bg" aria-hidden="true"></div>
    <div class="wrap">
      <span class="section-num">04 — Presença nacional</span>
      <h2>Do Luanda Sul à Lunda Norte, com a mesma equipa técnica.</h2>
      <p>Capilaridade não é vaidade de mapa: é tempo de resposta menor, equipas familiarizadas com cada região e capacidade de executar projetos multi-província para redes bancárias e cadeias de retalho.</p>
      <div class="band-stats">
        <div class="band-stat"><div class="n">100+</div><div class="l">pontos operacionais</div></div>
        <div class="band-stat"><div class="n">21</div><div class="l">províncias e municípios</div></div>
        <div class="band-stat"><div class="n">4</div><div class="l">instituições bancárias</div></div>
        <div class="band-stat"><div class="n">30+</div><div class="l">empresas de referência</div></div>
      </div>
      <a class="btn-ghost" style="margin-top:32px;" href="resultados.html">Explorar cobertura completa</a>
    </div>
  </section>

  <section class="proof" style="padding:40px 0;">
    <div class="wrap proof-inner">
      <span class="proof-label">CLIENTES DE REFERÊNCIA</span>
      <div class="logo-strip">
        <span>Banco Sol</span><span>Millennium Atlântico</span><span>DHL</span><span>FreshMart</span><span>Promasidor</span><span>Grupo Zara</span>
      </div>
    </div>
  </section>

  <section id="diferenciais">
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">05 — Sobre nós</span>
          <h2>Porque a conformidade legal é o produto, não o rótulo.</h2>
        </div>
        <p>A Wecomp existe para transformar segurança de centro de custo em vantagem competitiva. <a href="sobre.html" style="color:var(--teal-500); font-weight:600; text-decoration:none;">Conhecer a empresa →</a></p>
      </div>
      <div class="diff-table" style="margin-bottom:44px;">
        <div class="diff-row">
          <div class="diff-title">Especialização em conformidade angolana</div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Domínio dos Decretos Presidenciais 227/19 e 195/11 e da Lei Geral do Trabalho 12/23.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Evite multas, sanções e interdições — operação com segurança jurídica.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Metodologia HIRA</div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Identificação de perigos e avaliação de riscos antes de qualquer implementação.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Investimento alocado onde o risco é maior — sem gastos desnecessários.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Soluções integradas</div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Incêndio, SHST e segurança eletrónica a comunicar e a atuar em conjunto.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Visão 360º e resposta automatizada a incidentes.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Prova social em setores exigentes</div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Atuação comprovada em banca, indústria e logística de referência nacional.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Previsibilidade: a metodologia já foi testada nos ambientes mais complexos.</p></div>
        </div>
      </div>
"""
    + quote(
        "«Precisamos de um parceiro que responda em Luanda e no Huambo com o mesmo nível técnico — e que documente tudo para a auditoria.»",
        "Perfil de cliente-alvo · Direção de Operações, setor bancário",
    )
    + """
    </div>
  </section>
"""
    + faq(
        [
            (
                "Trabalham só em Luanda?",
                "Não. A operação cobre mais de 100 pontos em 21 províncias e municípios, incluindo Huambo, Cabinda, Lunda Norte e Benguela. Projetos multi-província são executados com a mesma equipa técnica e o mesmo caderno de encargos.",
            ),
            (
                "Fazem projeto ou só instalação?",
                "Ambos, e por esta ordem: levantamento HIRA, projeto conforme o decreto aplicável, implementação, comissionamento documentado e plano de manutenção. Não instalamos sem avaliação prévia do risco.",
            ),
            (
                "A consultoria inicial tem custo?",
                "O pedido de consultoria estratégica não obriga a compra. O âmbito e as condições do levantamento são acordados após a primeira reunião de enquadramento.",
            ),
            (
                "Como garantem a conformidade legal?",
                "Cada projeto é referenciado ao Decreto Presidencial 195/11, à NP 4386:2014 e à Lei Geral do Trabalho 12/23, conforme o tipo de instalação, e entregue com documentação que serve de suporte em vistoria e auditoria.",
            ),
        ]
    ),
)


# ---------------------------------------------------------------- SOBRE
page(
    "sobre.html",
    "Sobre Nós",
    "Quem é a Wecomp: engenharia de riscos, conformidade legal angolana e soluções integradas de segurança para setores de alta complexidade.",
    "sob",
    hero(
        "sobre-equipa.jpg",
        '<a href="wecomp-prototipo.html">Home</a> / Sobre Nós',
        "Quem somos",
        "Engenheiros da tranquilidade. Arquitetos da conformidade.",
        "A Wecomp não instala equipamento isolado. Integra engenharia de riscos (HIRA) com o Decreto Presidencial 227/19 e a Lei Geral do Trabalho 12/23 — para que a operação prospere sobre uma base legal e técnica.",
        """<div class="hero-ctas">
          <a class="btn-primary" href="contacto.html">Falar com a nossa equipa</a>
          <a class="btn-ghost" href="resultados.html">Ver cobertura</a>
        </div>""",
    )
    + """
  <section>
    <div class="wrap media-split reverse">
      <figure class="media-figure">
        <img src="img/metodologia-hira.jpg" alt="Engenheiro de segurança em inspeção técnica numa instalação industrial" width="1024" height="768" loading="lazy" decoding="async">
        <figcaption class="figcap">INSPEÇÃO TÉCNICA — FASE DE LEVANTAMENTO</figcaption>
      </figure>
      <div class="prose">
        <span class="section-num">01 — Quem somos</span>
        <h2 style="font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;">Parceiro estratégico, não fornecedor avulso.</h2>
        <p>Com atuação consolidada no mercado angolano, posicionamo-nos como pilar de confiança para líderes da indústria e instituições financeiras. Para clientes de grande porte e do setor bancário, a segurança é uma estratégia de negócio — não uma lista de compras.</p>
        <p>Compreendemos que a segurança transcende a instalação de equipamentos. Por isso a nossa abordagem integra a mais rigorosa engenharia de riscos com um conhecimento profundo da legislação angolana.</p>
        <p>O compromisso é transformar segurança de centro de custo em catalisador de crescimento: proteger património, pessoas e reputação com soluções que antecipam riscos e garantem continuidade.</p>
      </div>
    </div>
  </section>

  <section class="band" style="--bg:url('img/hero-home.jpg'); padding:96px 0;">
    <div class="band-bg" aria-hidden="true"></div>
    <div class="wrap">
      <span class="section-num">02 — Enquadramento legal</span>
      <h2>A legislação que domina o nosso caderno de encargos.</h2>
      <p>Não citamos decretos para decorar a apresentação. Cada um determina exigências concretas de projeto, execução e documentação.</p>
      <div class="band-stats" style="grid-template-columns:repeat(2,1fr);">
        <div class="band-stat"><div class="n" style="font-size:19px;">DP 227/19</div><div class="l">Enquadramento de segurança de instalações</div></div>
        <div class="band-stat"><div class="n" style="font-size:19px;">DP 195/11</div><div class="l">Regulamentação de segurança contra incêndios</div></div>
        <div class="band-stat"><div class="n" style="font-size:19px;">NP 4386:2014</div><div class="l">Norma técnica de referência para SCI</div></div>
        <div class="band-stat"><div class="n" style="font-size:19px;">LGT 12/23</div><div class="l">Deveres do empregador em saúde e segurança</div></div>
      </div>
    </div>
  </section>

  <section style="background:#fff;">
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">03 — Missão, visão e valores</span>
          <h2>Os princípios que sustentam cada projeto.</h2>
        </div>
        <p>Secção institucional — está aqui para quem precisa de validar a empresa, não como destino primário de navegação.</p>
      </div>
      <div class="values" style="margin-bottom:32px;">
        <div class="value">
          <span class="diff-label">MISSÃO</span>
          <h3>Proteger o presente, garantir o futuro</h3>
          <p>Soluções de segurança inteligentes e em total conformidade legal, transformando a gestão de riscos numa vantagem competitiva.</p>
        </div>
        <div class="value">
          <span class="diff-label">VISÃO</span>
          <h3>Referência em setores de alta complexidade</h3>
          <p>Ser a referência incontestável em Angola na engenharia de segurança, aliando inovação tecnológica, rigor técnico e respeito pela legislação nacional.</p>
        </div>
      </div>
      <div class="values">
        <div class="value"><h3>Rigor técnico</h3><p>A excelência é a única medida. A base é a engenharia, a precisão e metodologias como o HIRA para entregar resultados mensuráveis.</p></div>
        <div class="value"><h3>Compromisso com a conformidade</h3><p>Atuamos como guardiões da legalidade: cada solução em estrita conformidade com os decretos e leis angolanas, protegendo o cliente de contingências legais e fiscais.</p></div>
        <div class="value"><h3>Inovação com propósito</h3><p>Investimos em tecnologia não como fim, mas como meio para antecipar ameaças, otimizar processos e definir o padrão do mercado.</p></div>
        <div class="value"><h3>Parceria estratégica</h3><p>Cada cliente é um parceiro de longo prazo. Dedicamo-nos a compreender a operação para construir soluções à medida.</p></div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">04 — Diferenciais competitivos</span>
          <h2>Cada afirmação precisa de lastro.</h2>
        </div>
        <p>A tabela do portfólio, agora ligada a prova — cobertura, processo ou solução — em vez de autoafirmação solta.</p>
      </div>
      <div class="diff-table">
        <div class="diff-row">
          <div class="diff-title">Especialização em conformidade angolana<div class="proof-link"><a href="solucao-sci.html">Ver enquadramento SCI →</a></div></div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Domínio profundo dos Decretos Presidenciais 227/19 e 195/11 e da LGT 12/23.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Segurança jurídica: evite multas, sanções e interdições. Operação 100% legal.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Metodologia HIRA<div class="proof-link"><a href="solucoes.html">Ver processo nas soluções →</a></div></div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Análise científica de identificação de perigos e avaliação de riscos antes de implementar.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Otimização de investimento: recursos onde o risco é maior.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Soluções integradas<div class="proof-link"><a href="solucoes.html">SCI + eletrónica + SHST →</a></div></div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Sistemas de incêndio, SHST e segurança eletrónica que comunicam e atuam em conjunto.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Visão 360º: monitorização centralizada e automação da resposta a incidentes.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Prova em setores exigentes<div class="proof-link"><a href="resultados.html">Ver cobertura e casos →</a></div></div>
          <div class="diff-body"><span class="diff-label">O QUE FAZEMOS</span><p>Experiência comprovada em instituições financeiras, indústria e logística de referência.</p></div>
          <div class="diff-body"><span class="diff-label">BENEFÍCIO</span><p>Confiança e previsibilidade nos ambientes mais complexos.</p></div>
        </div>
      </div>
    </div>
  </section>

  <section style="background:var(--paper-dim);">
    <div class="wrap media-split">
      <div>
        <span class="section-num">05 — Equipa e certificações</span>
        <h2 style="font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;">Rigor técnico precisa de nomes e licenças.</h2>
        <div class="gap">
          <strong>Lacuna de conteúdo (AI §2.2).</strong> Para um setor onde conformidade legal é o argumento central, faltam no material-fonte: responsáveis técnicos, certificações profissionais e licenças da empresa. Esta secção existe no protótipo para forçar o preenchimento antes do lançamento — não deve ir a produção vazia.
        </div>
        <ul class="checklist">
          <li>Responsável técnico de SCI — nome, formação e cédula</li>
          <li>Responsável de SHST — certificação profissional</li>
          <li>Licenças e alvarás da empresa para atividade de segurança</li>
          <li>Certificações de fabricantes e parcerias tecnológicas</li>
        </ul>
      </div>
      <figure class="media-figure">
        <img src="img/sobre-equipa.jpg" alt="Equipa de engenheiros de segurança a analisar plantas de um edifício" width="1024" height="576" loading="lazy" decoding="async">
        <figcaption class="figcap">EQUIPA TÉCNICA EM ANÁLISE DE PROJETO</figcaption>
      </figure>
    </div>
  </section>
""",
)


# ---------------------------------------------------------------- SOLUÇÕES (índice)
page(
    "solucoes.html",
    "Soluções",
    "Segurança contra incêndios, segurança eletrónica e SHST: soluções integradas de engenharia com enquadramento legal angolano.",
    "sol",
    hero(
        "solucoes-integradas.jpg",
        '<a href="wecomp-prototipo.html">Home</a> / Soluções',
        "Soluções integradas",
        "Três frentes. Um ecossistema.",
        "Escolha pela necessidade técnica. Cada subpágina segue o mesmo template — problema de negócio, enquadramento legal, componentes, processo e CTA — para permitir comparação sem ruído.",
        """<div class="hero-ctas">
          <a class="btn-primary" href="contacto.html">Solicitar avaliação HIRA</a>
        </div>""",
    )
    + """
  <section>
    <div class="wrap">
      <div class="card-grid">
        <a class="card" href="solucao-sci.html">
          <div class="thumb"><img src="img/solucao-sci.jpg" alt="Instalação de detetor de fumo junto a tubagem de sprinklers" width="1024" height="768" loading="lazy" decoding="async"></div>
          <h3>Segurança Contra Incêndios</h3>
          <p>Da conformidade legal à continuidade do negócio. Deteção, extinção e evacuação como sistema único.</p>
          <div class="legal-ref">DP 195/11 · NP 4386:2014</div>
          <span class="goto">Ver solução →</span>
        </a>
        <a class="card" href="solucao-eletronica.html">
          <div class="thumb"><img src="img/solucao-eletronica.jpg" alt="Câmara dome e controlo de acessos biométrico em edifício de escritórios" width="1024" height="768" loading="lazy" decoding="async"></div>
          <h3>Segurança Eletrónica</h3>
          <p>Olhos que não dormem: CCTV com análise inteligente, acessos biométricos e deteção de intrusão.</p>
          <div class="legal-ref">Vigilância &amp; controlo de acessos</div>
          <span class="goto">Ver solução →</span>
        </a>
        <a class="card" href="solucao-shst.html">
          <div class="thumb"><img src="img/solucao-shst.jpg" alt="Trabalhador equipado com EPI certificado em ambiente fabril" width="1024" height="768" loading="lazy" decoding="async"></div>
          <h3>SHST e EPIs</h3>
          <p>A vida em primeiro lugar. Conformidade com a LGT, EPI certificado e sinalização de saúde e segurança.</p>
          <div class="legal-ref">Lei Geral do Trabalho 12/23</div>
          <span class="goto">Ver solução →</span>
        </a>
      </div>
    </div>
  </section>

  <section style="background:#fff;">
    <div class="wrap media-split">
      <figure class="media-figure">
        <img src="img/solucoes-integradas.jpg" alt="Central de deteção de incêndio e bastidor técnico integrado" width="1024" height="576" loading="lazy" decoding="async">
        <figcaption class="figcap">CENTRAL DE DETEÇÃO E BASTIDOR DE INTEGRAÇÃO</figcaption>
      </figure>
      <div class="prose">
        <span class="section-num">Integração</span>
        <h2 style="font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;">Sistemas que falam entre si valem mais do que a soma das partes.</h2>
        <p>Um alarme de incêndio que abre automaticamente as vias de evacuação, desbloqueia o controlo de acessos e marca a gravação de vídeo do momento do incidente é uma resposta. Três sistemas isolados são três relatórios diferentes no dia seguinte.</p>
        <ul class="checklist">
          <li>Monitorização centralizada dos três domínios</li>
          <li>Automação da resposta a incidentes</li>
          <li>Registo único para efeitos de auditoria e seguros</li>
          <li>Um só interlocutor técnico para toda a instalação</li>
        </ul>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">Processo comum</span>
          <h2>O mesmo método, seja qual for a solução.</h2>
        </div>
        <p>Quatro fases. O levantamento acontece sempre antes da proposta de equipamento.</p>
      </div>
      <div class="process">
        <div class="step"><div class="n">FASE 01</div><h3>Levantamento HIRA</h3><p>Identificação de perigos e avaliação de riscos no local, com registo fotográfico e classificação por severidade.</p></div>
        <div class="step"><div class="n">FASE 02</div><h3>Projeto e conformidade</h3><p>Projeto técnico alinhado ao decreto e à norma aplicáveis, dimensionado à operação real do cliente.</p></div>
        <div class="step"><div class="n">FASE 03</div><h3>Implementação</h3><p>Instalação, integração entre sistemas e comissionamento com testes documentados.</p></div>
        <div class="step"><div class="n">FASE 04</div><h3>Formação e manutenção</h3><p>Capacitação das equipas do cliente, plano de manutenção preventiva e suporte em vistoria.</p></div>
      </div>
      <div class="gap" style="margin-top:24px;"><strong>Em falta no material-fonte (AI §2.3).</strong> Prazos típicos por fase e responsáveis técnicos devem ser confirmados pela Wecomp antes do lançamento.</div>
    </div>
  </section>
""",
)


# ---------------------------------------------------------------- SUBPÁGINAS DE SOLUÇÃO
def solution_page(
    filename, title, desc, crumb, eyebrow, h1, lead, img, imgalt, imgcap,
    problem, symptoms, legal_items, comps, faq_items, cross, cta_label,
):
    comps_html = "".join(
        f'<div class="comp"><div class="n">{i:02d}</div><div><h3>{c[0]}</h3><p>{c[1]}</p></div></div>'
        for i, c in enumerate(comps, 1)
    )
    legal = "".join(
        f'<div><dt>{ref}</dt><dd>{what}</dd></div>' for ref, what in legal_items
    )
    chips = "".join(f'<a class="chip" href="{h}">{t}</a>' for h, t in cross)
    syms = "".join(f"<li>{s}</li>" for s in symptoms)

    body = (
        hero(
            img.replace(".jpg", ".jpg"),
            f'<a href="wecomp-prototipo.html">Home</a> / <a href="solucoes.html">Soluções</a> / {crumb}',
            eyebrow,
            h1,
            lead,
            f"""<div class="hero-ctas">
          <a class="btn-primary" href="contacto.html">{cta_label}</a>
          <a class="btn-ghost" href="solucoes.html">Comparar soluções</a>
        </div>""",
        )
        + f"""
  <section>
    <div class="wrap media-split">
      <figure class="media-figure">
        <img src="img/{img}" alt="{imgalt}" width="1024" height="768" loading="lazy" decoding="async">
        <figcaption class="figcap">{imgcap}</figcaption>
      </figure>
      <div class="prose">
        <span class="section-num">01 — O problema de negócio</span>
        <h2 style="font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;">Não começamos pela lista de equipamento.</h2>
        {problem}
        <p style="margin-top:22px; font-size:14px; color:var(--grey-600);">Sinais de que a sua operação precisa de intervenção</p>
        <ul class="checklist">{syms}</ul>
      </div>
    </div>
  </section>

  <section class="band" style="--bg:url('img/solucoes-integradas.jpg'); padding:92px 0;">
    <div class="band-bg" aria-hidden="true"></div>
    <div class="wrap">
      <span class="section-num">02 — Enquadramento legal</span>
      <h2>O que a lei exige nesta matéria.</h2>
      <p>Referências aplicáveis a esta solução, com o que cada uma determina na prática do projeto.</p>
      <dl class="spec" style="margin-top:36px; background:var(--line-dark); border-color:var(--line-dark);">
        {legal.replace('<div>', '<div style="background:rgba(6,20,34,0.72);">').replace('<dd>', '<dd style="color:#C6D0D9;">')}
      </dl>
    </div>
  </section>

  <section style="background:#fff;">
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">03 — Componentes e serviços</span>
          <h2>O ecossistema, não o catálogo.</h2>
        </div>
        <p>Cada componente é dimensionado a partir do risco identificado no levantamento — não a partir de um pacote pré-definido.</p>
      </div>
      <div class="comp-list">{comps_html}</div>
    </div>
  </section>

  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">04 — Processo de implementação</span>
          <h2>Quem faz o levantamento, em que fases, com que prazo.</h2>
        </div>
      </div>
      <div class="process">
        <div class="step"><div class="n">FASE 01</div><h3>Levantamento HIRA</h3><p>Avaliação presencial do risco, antes de qualquer proposta de equipamento.</p></div>
        <div class="step"><div class="n">FASE 02</div><h3>Projeto e conformidade</h3><p>Projeto técnico referenciado ao decreto e à norma aplicáveis.</p></div>
        <div class="step"><div class="n">FASE 03</div><h3>Implementação</h3><p>Instalação, integração e comissionamento com testes documentados.</p></div>
        <div class="step"><div class="n">FASE 04</div><h3>Formação e manutenção</h3><p>Capacitação das equipas, manutenção preventiva e suporte à auditoria.</p></div>
      </div>
      <div class="gap" style="margin-top:24px;"><strong>Em falta no material-fonte (AI §2.3).</strong> As fases são estrutura proposta; prazos típicos e responsáveis técnicos a confirmar pela Wecomp antes do lançamento.</div>
      <p style="margin-top:32px; font-size:14px; color:var(--grey-600);">Aplicação por setor</p>
      <div class="cross">{chips}</div>
    </div>
  </section>
"""
        + faq(faq_items)
    )
    page(filename, title, desc, "sol", body)


solution_page(
    "solucao-sci.html",
    "Segurança Contra Incêndios",
    "Deteção automática, extinção fixa e engenharia de evacuação em conformidade com o Decreto Presidencial 195/11 e a NP 4386:2014.",
    "SCI",
    "SCI · DP 195/11 · NP 4386:2014",
    "Proteção contra incêndios: da conformidade à continuidade.",
    "Um incêndio pode comprometer décadas de investimento em minutos. Projetamos ecossistemas de segurança que salvam vidas e protegem ativos — não vendemos extintores.",
    "solucao-sci.jpg",
    "Técnico a instalar detetor de fumo endereçável junto a tubagem de sprinklers",
    "INSTALAÇÃO DE DETEÇÃO AUTOMÁTICA ENDEREÇÁVEL",
    "<p>O responsável de compliance e o gestor de instalações precisam de duas coisas ao mesmo tempo: um sistema que passe na vistoria e um sistema que funcione no dia do incidente. Nem sempre são a mesma coisa — e é aí que os projetos falham.</p>"
    "<p>Tratamos SCI como engenharia de continuidade: deteção, extinção e evacuação dimensionadas em conjunto, para que o incêndio contido não se transforme em interdição da instalação nem em paragem prolongada.</p>",
    [
        "Extintores como única medida de proteção da instalação",
        "Projeto de incêndio inexistente, desatualizado ou não aprovado",
        "Sinalização de evacuação ausente, apagada ou a apontar para saídas trancadas",
        "Sistemas instalados por fornecedores diferentes, sem integração nem manutenção",
    ],
    [
        ("Decreto Presidencial 195/11", "Regulamenta a segurança contra incêndios em edifícios e instalações: obriga a projeto, meios de deteção, extinção e condições de evacuação adequados à utilização-tipo."),
        ("NP 4386:2014", "Norma técnica de referência para conceção e instalação de sistemas de deteção e alarme — define critérios de cobertura, zonamento e sinalização."),
        ("Decreto Presidencial 227/19", "Enquadramento mais amplo de segurança das instalações, aplicável quando a SCI integra o plano de segurança global."),
        ("Lei Geral do Trabalho 12/23", "Impõe ao empregador condições seguras de trabalho, incluindo formação e meios de evacuação para os trabalhadores."),
    ],
    [
        ("Sistemas de deteção automática", "Centrais endereçáveis e convencionais, detetores de fumo, temperatura e chama. Alarme cedo e localização precisa do foco — a diferença entre conter e evacuar."),
        ("Sistemas de extinção fixa", "Sprinklers, redes de carretéis, hidrantes e agentes limpos para salas técnicas e datacenters, onde a água destruiria o que o fogo ainda não destruiu."),
        ("Engenharia de evacuação", "Iluminação de emergência, sinalização fotoluminescente e definição de caminhos de evacuação dimensionados à lotação real do edifício."),
        ("Extintores e meios de primeira intervenção", "Seleção do agente correto por classe de fogo, distribuição conforme o risco e plano de inspeção periódica."),
        ("Projeto e documentação de conformidade", "Peças escritas e desenhadas que suportam licenciamento, vistoria e apólice de seguro."),
        ("Manutenção e testes periódicos", "Verificação funcional programada, com registo — porque um sistema sem manutenção é um sistema não conforme."),
    ],
    [
        ("Quanto tempo demora um projeto de SCI?", "Depende da área, da utilização-tipo e do número de pisos. O prazo é apresentado após o levantamento HIRA, com faseamento que permite manter a instalação operacional durante os trabalhos."),
        ("Podem trabalhar com o edifício em funcionamento?", "Sim. Em banca e retalho é a regra, não a exceção. Os trabalhos são faseados por zona e, quando necessário, executados fora do horário de funcionamento."),
        ("Deteção endereçável ou convencional?", "A endereçável identifica o dispositivo exato que disparou, o que reduz drasticamente o tempo de localização em edifícios grandes. A convencional continua adequada em instalações pequenas. A decisão sai do levantamento, não do catálogo."),
        ("Fazem a manutenção depois da instalação?", "Sim, com plano de manutenção preventiva e registo de testes — documentação que é exigida em vistoria e frequentemente pedida pelas seguradoras."),
    ],
    [("setor-bancario.html", "Setor bancário"), ("setor-retalho.html", "Retalho e distribuição"), ("setor-industria.html", "Indústria, logística e saúde")],
    "Solicitar avaliação HIRA",
)

solution_page(
    "solucao-eletronica.html",
    "Segurança Eletrónica",
    "CCTV com análise de vídeo, controlo de acessos biométrico e deteção de intrusão de alta precisão para ambientes críticos.",
    "Eletrónica",
    "Vigilância e controlo de acessos",
    "Vigilância inteligente e controlo absoluto.",
    "A segurança do património exige olhos que nunca dormem e sistemas que nunca falham. Implementamos soluções desenhadas para dissuadir, detetar e documentar qualquer ameaça.",
    "solucao-eletronica.jpg",
    "Câmara de videovigilância dome e leitor de acessos biométrico num átrio empresarial",
    "CCTV E CONTROLO DE ACESSOS EM ÁTRIO EMPRESARIAL",
    "<p>No retalho, o problema é fluxo de público, quebra desconhecida e sinistros. Na banca, é o perímetro da agência, a sala de cofre e a evidência utilizável numa investigação. Em ambos, câmaras sem estratégia produzem horas de vídeo que ninguém consegue usar.</p>"
    "<p>Desenhamos a partir da pergunta certa: que evento precisa de ser detetado, por quem, em quanto tempo, e que prova é necessária depois. O equipamento vem a seguir.</p>",
    [
        "Gravações que não permitem identificar quem esteve no local",
        "Câmaras instaladas onde havia cabo, não onde está o risco",
        "Chaves e cartões partilhados, sem registo de quem entrou e quando",
        "Alarmes com falsos positivos frequentes, já ignorados pela equipa",
    ],
    [
        ("Decreto Presidencial 227/19", "Enquadra os sistemas de segurança da instalação, incluindo os meios eletrónicos que integram o plano de segurança."),
        ("Requisitos setoriais", "Banca e retalho têm exigências próprias de cobertura, retenção de imagem e controlo de zonas restritas, validadas no levantamento."),
        ("Proteção de dados e imagem", "A recolha de imagem e de dados biométricos implica deveres de informação, finalidade e conservação — a definir com aconselhamento jurídico do cliente."),
        ("Articulação com a SCI", "Em evacuação, o controlo de acessos tem de libertar as vias — a integração com a deteção de incêndio é requisito de segurança, não opção."),
    ],
    [
        ("Videovigilância (CCTV) com análise de vídeo", "Deteção de eventos, contagem e alarmes por regra — em vez de horas de gravação passiva que ninguém revê."),
        ("Controlo de acessos biométrico e por cartão", "Quem entra, onde e quando, com registo auditável e perfis por função e horário."),
        ("Deteção de intrusão de alta precisão", "Sensores dimensionados ao ambiente para reduzir falsos positivos — o alarme só é útil se a equipa ainda acreditar nele."),
        ("Integração e monitorização centralizada", "Uma única consola para vídeo, acessos e intrusão, com articulação com os sistemas de incêndio."),
        ("Infraestrutura de rede e armazenamento", "Dimensionamento de largura de banda, gravação e política de retenção conforme a necessidade legal e operacional."),
        ("Manutenção e verificação de operacionalidade", "Testes periódicos que confirmam que o sistema estava a gravar no dia em que foi preciso."),
    ],
    [
        ("Conseguem usar as câmaras que já temos?", "Frequentemente sim. O levantamento avalia o que é reaproveitável em termos de posicionamento, resolução e infraestrutura, e o que tem de ser substituído para cumprir o objetivo definido."),
        ("Quanto tempo de gravação devemos guardar?", "Depende da finalidade e do enquadramento aplicável à sua atividade. Dimensionamos o armazenamento em função da política de retenção que o cliente definir com o seu aconselhamento jurídico."),
        ("A biometria é obrigatória no controlo de acessos?", "Não. Cartão, PIN e biometria têm níveis de segurança e de exigência distintos. Em zonas críticas justifica-se a combinação de dois fatores; noutras, o cartão é suficiente."),
        ("Os sistemas comunicam com a deteção de incêndio?", "Sim, e devem. Numa evacuação, os acessos têm de desbloquear as vias de saída automaticamente. É um dos pontos que verificamos no comissionamento."),
    ],
    [("setor-retalho.html", "Retalho e distribuição"), ("setor-bancario.html", "Setor bancário"), ("setor-industria.html", "Indústria, logística e saúde")],
    "Solicitar avaliação HIRA",
)

solution_page(
    "solucao-shst.html",
    "SHST e EPIs",
    "Segurança, higiene e saúde no trabalho: EPI certificado, primeiros socorros e sinalização em conformidade com a Lei Geral do Trabalho 12/23.",
    "SHST",
    "SHST · LGT 12/23",
    "A vida em primeiro lugar. A produtividade como consequência.",
    "Um ambiente de trabalho seguro é a base de uma operação eficiente. Fornecemos soluções completas de SHST, garantindo que a sua equipa opera nas melhores condições e em conformidade com a Lei Geral do Trabalho.",
    "solucao-shst.jpg",
    "Trabalhador industrial equipado com capacete, óculos de proteção e colete de alta visibilidade",
    "EPI CERTIFICADO EM AMBIENTE INDUSTRIAL",
    "<p>O responsável de SHST na indústria, na logística ou na saúde não pesquisa «câmaras». Pesquisa conformidade com a LGT, documentação de EPI e prova defensável numa auditoria ou num processo.</p>"
    "<p>Esta é a frente onde o risco é humano antes de ser patrimonial: um acidente evitável custa a pessoa, a produção e a exposição legal da administração. Priorizamos a partir do risco ocupacional real levantado no terreno.</p>",
    [
        "EPI comprado por preço, sem certificação nem adequação ao risco",
        "Ausência de registo de entrega e substituição de equipamento",
        "Sinalização de segurança inexistente ou incompreensível para a equipa",
        "Kits de primeiros socorros incompletos ou fora de validade",
    ],
    [
        ("Lei Geral do Trabalho 12/23", "Estabelece os deveres do empregador em matéria de segurança, higiene e saúde no trabalho, incluindo prevenção, informação e meios de proteção."),
        ("Decreto Presidencial 227/19", "Enquadra a segurança das instalações onde a atividade laboral decorre, articulando-se com as medidas de SHST."),
        ("Requisitos de EPI certificado", "O equipamento tem de ser adequado ao risco identificado e devidamente certificado — a certificação é parte da prova de conformidade."),
        ("Sinalização de segurança e saúde", "A comunicação visual de riscos, rotas e obrigações é requisito legal e primeira linha de prevenção."),
    ],
    [
        ("EPI certificado", "Capacetes, proteção ocular e auditiva, luvas, calçado e vestuário de alta visibilidade, selecionados por risco e por posto de trabalho."),
        ("Kits e cabines de primeiros socorros", "Meios de resposta imediata dimensionados ao número de trabalhadores e à distância de socorro externo."),
        ("Sinalização de segurança e saúde", "Sinalética de perigo, obrigação, proibição e emergência, colocada segundo critérios de visibilidade e circulação."),
        ("Avaliação de riscos ocupacionais", "HIRA aplicado ao posto de trabalho: que exposição existe, com que frequência e com que gravidade potencial."),
        ("Formação e sensibilização das equipas", "O EPI só protege se for usado corretamente — a formação é parte da solução, não um extra."),
        ("Gestão documental de conformidade", "Registos de entrega, inspeção e substituição que sustentam a posição do empregador em auditoria."),
    ],
    [
        ("Fornecem EPI ou também fazem a avaliação?", "Ambos, e a avaliação vem primeiro. Fornecer equipamento sem avaliação de risco é o erro mais comum e o mais caro, porque produz conformidade aparente sem proteção real."),
        ("Como se prova a conformidade com a LGT numa auditoria?", "Com documentação: avaliação de riscos, registo de entrega de EPI por trabalhador, comprovativo de formação, plano de sinalização e manutenção dos meios de emergência."),
        ("Isto aplica-se a escritórios ou só a fábricas?", "Aplica-se a qualquer empregador. O que muda é o perfil de risco: num escritório dominam ergonomia e evacuação; numa fábrica, exposição mecânica, química e ruído."),
        ("Dão formação às nossas equipas?", "Sim. A capacitação está prevista na fase 04 do processo e é adaptada aos postos de trabalho identificados no levantamento."),
    ],
    [("setor-industria.html", "Indústria, logística e saúde"), ("setor-bancario.html", "Setor bancário"), ("setor-retalho.html", "Retalho e distribuição")],
    "Solicitar avaliação HIRA",
)


# ---------------------------------------------------------------- SETORES (índice)
page(
    "setores.html",
    "Setores",
    "Banca, retalho e indústria: segmentação por jornada de decisão, com soluções cruzadas por setor.",
    "set",
    hero(
        "setor-bancario.jpg",
        '<a href="wecomp-prototipo.html">Home</a> / Setores',
        "Segmentação",
        "Cada indústria mede segurança de forma diferente.",
        "Três públicos, três jornadas de decisão. Não tratamos banca, retalho e indústria como um único bloco de «setores que servimos».",
        """<div class="hero-ctas">
          <a class="btn-primary" href="contacto.html">Pedir consultoria estratégica</a>
        </div>""",
    )
    + """
  <section class="sector-section">
    <div class="wrap">
      <div class="card-grid">
        <a class="card" href="setor-bancario.html">
          <div class="thumb"><img src="img/setor-bancario.jpg" alt="Interior de agência bancária com balcão e sinalização de emergência" width="1024" height="768" loading="lazy" decoding="async"></div>
          <span class="tag">Banca &amp; finanças</span>
          <h3>Setor Bancário</h3>
          <p>Continuidade da agência, citação legal exata e evidência para compliance. Sedes, agências e centralidades.</p>
          <div class="legal-ref">Banco Sol · Millennium Atlântico · Banco Yetu · Kixicrédito</div>
          <span class="goto">Ver setor →</span>
        </a>
        <a class="card" href="setor-retalho.html">
          <div class="thumb"><img src="img/setor-retalho.jpg" alt="Galeria comercial com clientes em circulação" width="1024" height="768" loading="lazy" decoding="async"></div>
          <span class="tag">Retalho</span>
          <h3>Retalho e Distribuição</h3>
          <p>Fluxo de público, deteção de intrusão e redução de sinistros — sem fechar a loja.</p>
          <div class="legal-ref">FreshMart · LC Waikiki · Belas Shopping</div>
          <span class="goto">Ver setor →</span>
        </a>
        <a class="card" href="setor-industria.html">
          <div class="thumb"><img src="img/setor-industria.jpg" alt="Armazém logístico com trabalhadores equipados com EPI" width="1024" height="768" loading="lazy" decoding="async"></div>
          <span class="tag">Indústria &amp; saúde</span>
          <h3>Indústria, Logística e Saúde</h3>
          <p>SHST, EPI e ambientes de risco elevado — conformidade como condição de operar.</p>
          <div class="legal-ref">DHL · Promasidor · Hospital D. Emílio Nascimento</div>
          <span class="goto">Ver setor →</span>
        </a>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">Comparação</span>
          <h2>O que muda de setor para setor.</h2>
        </div>
        <p>A mesma engenharia, ponderada de forma diferente conforme o que está em risco.</p>
      </div>
      <div class="diff-table">
        <div class="diff-row">
          <div class="diff-title">Banca e finanças</div>
          <div class="diff-body"><span class="diff-label">PERGUNTA CENTRAL</span><p>«A agência continua aberta e o incidente fica documentado?»</p></div>
          <div class="diff-body"><span class="diff-label">PESO DAS SOLUÇÕES</span><p>Segurança eletrónica e SCI, com forte exigência documental.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Retalho e distribuição</div>
          <div class="diff-body"><span class="diff-label">PERGUNTA CENTRAL</span><p>«Consigo proteger público e stock sem travar o fluxo de clientes?»</p></div>
          <div class="diff-body"><span class="diff-label">PESO DAS SOLUÇÕES</span><p>Segurança eletrónica e evacuação dimensionada à lotação.</p></div>
        </div>
        <div class="diff-row">
          <div class="diff-title">Indústria, logística e saúde</div>
          <div class="diff-body"><span class="diff-label">PERGUNTA CENTRAL</span><p>«Estou em conformidade com a LGT e consigo prová-lo?»</p></div>
          <div class="diff-body"><span class="diff-label">PESO DAS SOLUÇÕES</span><p>SHST e EPI em primeiro plano, com SCI em zonas de risco elevado.</p></div>
        </div>
      </div>
    </div>
  </section>
""",
)


# ---------------------------------------------------------------- SUBPÁGINAS DE SETOR
def sector_page(
    filename, title, desc, crumb, tag, h1, lead, img, imgalt, imgcap,
    body_prose, challenges, checklist_items, clients, sols, quote_text, quote_who, faq_items,
):
    ch = "".join(
        f'<div class="risk"><div class="n">DESAFIO {i:02d}</div><h3>{c[0]}</h3><p>{c[1]}</p></div>'
        for i, c in enumerate(challenges, 1)
    )
    chips = "".join(f'<a class="chip" href="{h}">{t}</a>' for h, t in sols)
    checks = "".join(f"<li>{c}</li>" for c in checklist_items)
    cl = "".join(f"<li>{c}</li>" for c in clients)

    body = (
        hero(
            img,
            f'<a href="wecomp-prototipo.html">Home</a> / <a href="setores.html">Setores</a> / {crumb}',
            tag,
            h1,
            lead,
            """<div class="hero-ctas">
          <a class="btn-primary" href="contacto.html">Pedir consultoria estratégica</a>
          <a class="btn-ghost" href="solucoes.html">Ver soluções</a>
        </div>""",
        )
        + f"""
  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">01 — Contexto do setor</span>
          <h2>Os três desafios que ouvimos neste setor.</h2>
        </div>
      </div>
      <div class="risk-grid">{ch}</div>
    </div>
  </section>

  <section style="background:#fff;">
    <div class="wrap media-split">
      <figure class="media-figure">
        <img src="img/{img}" alt="{imgalt}" width="1024" height="768" loading="lazy" decoding="async">
        <figcaption class="figcap">{imgcap}</figcaption>
      </figure>
      <div class="prose">
        <span class="section-num">02 — Como respondemos</span>
        {body_prose}
        <ul class="checklist">{checks}</ul>
        <p style="margin-top:26px; font-size:14px; color:var(--grey-600);">Soluções relevantes para este setor</p>
        <div class="cross">{chips}</div>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap split">
      <div>
        <span class="section-num">03 — Carteira neste setor</span>
        <h2 style="font-size:clamp(22px,2.6vw,28px); margin-bottom:16px;">Referências de mercado.</h2>
        <div class="legal-box">
          <span class="mono">CITAR SÓ COM AUTORIZAÇÃO DE MARCA</span>
          <h3 style="margin-top:12px;">Clientes deste segmento</h3>
          <ul>{cl}</ul>
        </div>
        <p class="map-note">AI §5: confirmar autorização de uso de marca e logótipo antes de publicar.</p>
      </div>
      <div style="align-self:center;">
        {quote(quote_text, quote_who)}
      </div>
    </div>
  </section>
"""
        + faq(faq_items)
    )
    page(filename, title, desc, "set", body)


sector_page(
    "setor-bancario.html",
    "Setor Bancário e Financeiro",
    "Segurança para agências, sedes e centralidades bancárias: continuidade operacional, conformidade legal e evidência para compliance.",
    "Banca",
    "Banca e finanças",
    "Continuidade da agência. Citação legal. Zero improvisação.",
    "O responsável de compliance chega a perguntar pelo Decreto 227/19 e pela operação da rede. Respondemos com SCI, segurança eletrónica e cobertura nacional — não com um slide genérico de setores.",
    "setor-bancario.jpg",
    "Interior de agência bancária moderna com câmara de segurança e sinalização de saída de emergência",
    "AGÊNCIA BANCÁRIA — CCTV E SINALIZAÇÃO DE EVACUAÇÃO",
    "<h2 style=\"font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;\">A rede tem de ter o mesmo padrão em Luanda e no interior.</h2>"
    "<p>Agências, sedes e centralidades exigem o mesmo rigor técnico independentemente da província: SCI conforme o DP 195/11, vigilância e controlo de acessos, e documentação que sustente a auditoria interna e a vistoria externa.</p>"
    "<p>O argumento não é «já trabalhamos com bancos». É que uma rede multi-província executada com um único caderno de encargos evita o cenário mais comum: vinte agências com vinte níveis diferentes de segurança.</p>",
    [
        ("Padrão desigual entre agências", "Cada agência foi equipada por um fornecedor diferente, em anos diferentes. O nível de proteção varia e ninguém tem a visão consolidada da rede."),
        ("Prova para compliance", "A auditoria não pergunta se há câmaras. Pergunta que evidência existe, com que retenção e quem tem acesso a ela."),
        ("Continuidade da operação", "Fechar uma agência por não conformidade ou por incidente tem custo direto de receita e custo indireto de confiança do cliente."),
    ],
    [
        "Levantamento HIRA por tipologia de agência, replicável a toda a rede",
        "Caderno de encargos único, aplicado de Luanda a Cabinda",
        "Integração entre deteção de incêndio, CCTV e controlo de acessos",
        "Documentação de conformidade organizada para auditoria e seguro",
        "Trabalhos faseados fora do horário de atendimento ao público",
    ],
    ["Banco Sol", "Millennium Atlântico", "Banco Yetu", "Kixicrédito"],
    [("solucao-eletronica.html", "Segurança Eletrónica"), ("solucao-sci.html", "Segurança Contra Incêndios"), ("solucao-shst.html", "SHST e EPIs"), ("resultados.html", "Cobertura nacional")],
    "«Precisamos do mesmo padrão técnico em todas as agências e de documentação que aguente uma auditoria.»",
    "Perfil de decisor · Compliance / Operações, banca",
    [
        ("Conseguem intervir sem fechar a agência?", "Sim. Os trabalhos são planeados por zona e, quando o impacto no atendimento é inevitável, executados fora do horário de funcionamento."),
        ("Trabalham em toda a rede nacional?", "Sim. A cobertura abrange mais de 100 pontos operacionais em 21 províncias e municípios, o que permite tratar a rede como um único projeto."),
        ("Que documentação entregam no fim?", "Projeto, registos de comissionamento e testes, plano de manutenção e a documentação de suporte a vistoria e apólice de seguro."),
        ("Integram-se com os sistemas que já temos?", "Avaliamos no levantamento o que é reaproveitável. O objetivo é convergir para uma consola única, não multiplicar sistemas paralelos."),
    ],
)

sector_page(
    "setor-retalho.html",
    "Retalho e Distribuição",
    "Segurança para superfícies comerciais e centros comerciais: fluxo de público, deteção de intrusão e evacuação sem parar a operação.",
    "Retalho",
    "Retalho e distribuição",
    "Fluxo de público. Deteção rápida. Loja aberta.",
    "O gestor de instalações mede sucesso em minutos de paragem evitados e em sinistros que não aconteceram — não em declarações de missão.",
    "setor-retalho.jpg",
    "Galeria de centro comercial com elevado fluxo de clientes e sinalização de emergência",
    "AMBIENTE DE ELEVADO FLUXO DE PÚBLICO",
    "<h2 style=\"font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;\">Proteger pessoas e stock sem travar o negócio.</h2>"
    "<p>Ambientes de elevado fluxo — superfícies alimentares, retalho de moda, centros comerciais — concentram três riscos ao mesmo tempo: incêndio com lotação elevada, intrusão e quebra, e pânico numa evacuação mal sinalizada.</p>"
    "<p>A combinação útil é segurança eletrónica com SCI dimensionada à lotação real, mais procedimentos claros para as equipas de loja, que são quem está no local no primeiro minuto.</p>",
    [
        ("Evacuação com lotação elevada", "O dimensionamento não pode ser feito pela área da loja, mas pelo número de pessoas presentes em hora de ponta."),
        ("Quebra e sinistros", "Sem análise de vídeo e controlo de zonas restritas, a quebra desconhecida fica sem explicação e sem prova."),
        ("Impacto comercial das obras", "Fechar corredores em época alta custa vendas. O faseamento é parte do projeto, não um detalhe de execução."),
    ],
    [
        "Dimensionamento da evacuação pela lotação real, não pela área",
        "CCTV com análise de vídeo em caixas, armazém e zonas restritas",
        "Controlo de acessos entre área pública e área de reserva",
        "Sinalização fotoluminescente e iluminação de emergência nos percursos",
        "Execução faseada, com zonas críticas fora do horário comercial",
    ],
    ["FreshMart", "LC Waikiki", "Sakidila", "Grupo Zara", "Kibabo", "Belas Shopping"],
    [("solucao-eletronica.html", "Segurança Eletrónica"), ("solucao-sci.html", "Segurança Contra Incêndios"), ("solucao-shst.html", "SHST e EPIs")],
    "«Não posso fechar corredores em época alta — preciso de um plano de execução que respeite o calendário comercial.»",
    "Perfil de decisor · Gestão de instalações, retalho",
    [
        ("Como evitam impacto nas vendas durante a obra?", "Com faseamento por zona e trabalhos em horário não comercial nas áreas críticas. O plano de execução é acordado antes do início, com o calendário comercial em cima da mesa."),
        ("A análise de vídeo ajuda a reduzir quebra?", "Ajuda a detetar padrões e a produzir evidência utilizável. Não substitui procedimento interno, mas transforma vídeo passivo em informação acionável."),
        ("Quantas saídas de emergência precisamos?", "Depende da lotação, da distância a percorrer e da configuração do espaço. É calculado no projeto, referenciado ao DP 195/11."),
        ("Trabalham em centros comerciais com várias lojas?", "Sim, incluindo a articulação entre o sistema da loja e o sistema central do edifício, que é onde costumam surgir as incompatibilidades."),
    ],
)

sector_page(
    "setor-industria.html",
    "Indústria, Logística e Saúde",
    "SHST, EPI e segurança em ambientes de risco elevado: indústria, logística, infraestruturas e unidades hospitalares.",
    "Indústria e saúde",
    "Indústria, logística e saúde",
    "SHST primeiro. Depois a linha continua.",
    "O responsável de SHST quer conformidade com a Lei Geral do Trabalho, EPI documentado e ambientes de risco elevado sob controlo — não um pacote genérico de câmaras.",
    "setor-industria.jpg",
    "Trabalhadores com capacete e colete de alta visibilidade a verificar operações num armazém logístico",
    "OPERAÇÃO LOGÍSTICA COM EPI E PROCEDIMENTO",
    "<h2 style=\"font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;\">O risco ocupacional e o risco da instalação não se separam.</h2>"
    "<p>Indústria, logística, infraestruturas e unidades hospitalares partilham uma exigência: a proteção das pessoas é simultaneamente obrigação legal e condição de continuidade da operação. Um acidente para a linha, aciona responsabilidade e expõe a administração.</p>"
    "<p>O HIRA define onde investir; SHST, SCI e segurança eletrónica executam. Em ambientes hospitalares acresce a exigência de evacuação de pessoas com mobilidade reduzida, que muda completamente o dimensionamento.</p>",
    [
        ("Prova de conformidade com a LGT", "Sem registo de entrega de EPI, formação e avaliação de riscos, a conformidade é afirmada mas não demonstrável."),
        ("Ambientes de risco elevado", "Zonas com exposição mecânica, química, elétrica ou de ruído exigem medidas específicas, não equipamento genérico."),
        ("Evacuação em contextos críticos", "Em unidades de saúde e instalações industriais, evacuar exige planeamento de percursos, meios e responsabilidades definidas."),
    ],
    [
        "Avaliação de riscos ocupacionais por posto de trabalho",
        "EPI certificado selecionado por exposição, com registo de entrega",
        "Sinalização de segurança e saúde adequada a cada zona",
        "Kits e cabines de primeiros socorros dimensionados à equipa",
        "Formação das equipas e gestão documental para auditoria",
    ],
    ["Promasidor", "DHL", "Transmaka", "Mundial Seguros", "Academia BAI", "Barragem do Luachimo", "Hospital Dom Emílio Nascimento"],
    [("solucao-shst.html", "SHST e EPIs"), ("solucao-sci.html", "Segurança Contra Incêndios"), ("solucao-eletronica.html", "Segurança Eletrónica")],
    "«Preciso de demonstrar conformidade com a LGT numa auditoria, com registos por trabalhador e por posto.»",
    "Perfil de decisor · Responsável de SHST, indústria",
    [
        ("Por onde começa um programa de SHST?", "Pela avaliação de riscos por posto de trabalho. Comprar EPI antes disso produz conformidade aparente e proteção incerta."),
        ("Fornecem EPI de forma recorrente?", "Sim, com plano de substituição e registo, que é precisamente a documentação exigida em auditoria."),
        ("Trabalham em unidades hospitalares?", "Sim. O contexto hospitalar exige atenção específica à evacuação de pessoas com mobilidade reduzida e à continuidade de serviços críticos."),
        ("Dão formação aos trabalhadores?", "Sim, adaptada aos riscos identificados no levantamento e aos postos de trabalho reais, não a um programa genérico."),
    ],
)


# ---------------------------------------------------------------- RESULTADOS
points = [
    ("Luanda", "banca", "Sedes, agências e centralidades bancárias"),
    ("Luanda", "retalho", "Retalho alimentar e centros comerciais de elevado fluxo"),
    ("Luanda", "industria", "Logística, indústria e serviços"),
    ("Viana", "industria", "Base operacional — Rua da Vila"),
    ("Huambo", "banca", "Cobertura de rede bancária no planalto"),
    ("Cabinda", "banca", "Presença em enclave e operações associadas"),
    ("Lunda Norte", "industria", "Infraestrutura e operações de risco elevado"),
    ("Benguela", "retalho", "Retalho e distribuição no litoral"),
    ("Huíla", "industria", "Indústria e operações multi-província"),
    ("Malanje", "banca", "Agências e continuidade de rede"),
    ("Uíge", "banca", "Cobertura de rede no norte"),
    ("Namibe", "retalho", "Distribuição e retalho"),
]
points_html = "".join(
    f'<div class="point" data-point data-setor="{s}"><span class="tag ink">{s.upper()}</span><h3>{p}</h3><p>{d}</p></div>'
    for p, s, d in points
)

page(
    "resultados.html",
    "Resultados e Cobertura",
    "Mais de 100 pontos operacionais em 21 províncias e municípios de Angola, com filtro por setor e estrutura de casos de referência.",
    "res",
    hero(
        "cobertura-nacional.jpg",
        '<a href="wecomp-prototipo.html">Home</a> / Resultados',
        "Resultados e cobertura",
        "Presença nacional. Tempos de resposta locais.",
        "Mais de 100 pontos operacionais em 21 províncias e municípios. Filtre por setor — a tabela do portfólio transforma-se em pesquisa, não em texto corrido.",
        """<div class="hero-ctas">
          <a class="btn-primary" href="contacto.html">Falar sobre a sua operação</a>
        </div>""",
        """
    <div class="stat-bar">
      <div class="wrap">
        <div class="stat-grid">
          <div class="stat-item"><div class="stat-num">100+</div><div class="stat-label">pontos operacionais</div></div>
          <div class="stat-item"><div class="stat-num">21</div><div class="stat-label">províncias e municípios</div></div>
          <div class="stat-item"><div class="stat-num">4</div><div class="stat-label">instituições bancárias</div></div>
          <div class="stat-item"><div class="stat-num">30+</div><div class="stat-label">empresas de referência</div></div>
        </div>
      </div>
    </div>""",
    )
    + f"""
  <section>
    <div class="wrap media-split reverse">
      <figure class="media-figure">
        <img src="img/cobertura-nacional.jpg" alt="Equipa técnica a descarregar equipamento junto a um edifício comercial ao fim da tarde" width="1024" height="576" loading="lazy" decoding="async">
        <figcaption class="figcap">EQUIPA EM DESLOCAÇÃO — INTERVENÇÃO NO TERRENO</figcaption>
      </figure>
      <div class="prose">
        <span class="section-num">01 — O que significa cobertura</span>
        <h2 style="font-size:clamp(22px,2.8vw,30px); margin-bottom:16px;">Capilaridade traduz-se em vantagem concreta.</h2>
        <p>Estar presente em 21 províncias e municípios não é um número de vaidade. É o que permite responder com o mesmo rigor técnico em Luanda, no Huambo, na Lunda Norte ou em Cabinda.</p>
        <ul class="checklist">
          <li>Tempos de resposta reduzidos, por proximidade das equipas</li>
          <li>Equipas familiarizadas com as especificidades de cada região</li>
          <li>Execução comprovada em projetos multi-província</li>
          <li>Um único caderno de encargos para toda a rede do cliente</li>
        </ul>
      </div>
    </div>
  </section>

  <section style="background:#fff;">
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">02 — Presença nacional</span>
          <h2>Filtrar por setor, não percorrer uma tabela.</h2>
        </div>
        <p><span id="filterCount">12</span> localizações visíveis. No protótipo, amostra representativa — substituir pela carteira completa na versão final.</p>
      </div>
      <div class="filter-bar" role="group" aria-label="Filtrar por setor">
        <button type="button" data-filter="todos" aria-pressed="true">Todos</button>
        <button type="button" data-filter="banca" aria-pressed="false">Banca</button>
        <button type="button" data-filter="retalho" aria-pressed="false">Retalho</button>
        <button type="button" data-filter="industria" aria-pressed="false">Indústria e saúde</button>
      </div>
      <div class="points">{points_html}</div>
      <div class="gap" style="margin-top:24px;"><strong>Nota de implementação (AI §2.5).</strong> Na versão final este bloco deve ser um mapa interativo com filtro por província e setor, alimentado pela lista completa de pontos operacionais.</div>
    </div>
  </section>

  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">03 — Casos de referência</span>
          <h2>Problema, intervenção e resultado mensurável.</h2>
        </div>
        <p>Logótipos são o nível mais fraco de prova em B2B. Esta página precisa de dois a quatro casos reais antes do lançamento.</p>
      </div>
      <div class="gap" style="margin-bottom:24px;"><strong>Não preenchível com o material atual (AI §2.5).</strong> Os cartões mostram a estrutura. Sem métrica — tempo de resposta, resultado de auditoria, redução de incidentes — não deve ser publicado como caso.</div>
      <div class="case-grid">
        <article class="case placeholder">
          <span class="tag ink">ESTRUTURA</span>
          <h3>Caso A — a preencher</h3>
          <dl>
            <dt>PROBLEMA</dt><dd>Qual era o risco operacional ou o gap legal identificado no início?</dd>
            <dt>INTERVENÇÃO</dt><dd>HIRA e solução aplicada (SCI, eletrónica ou SHST), com âmbito: agências, fábrica ou loja.</dd>
            <dt>RESULTADO</dt><dd>Número acordado com o cliente: prazo, resultado de auditoria, incidentes evitados, cobertura atingida.</dd>
          </dl>
        </article>
        <article class="case placeholder">
          <span class="tag ink">ESTRUTURA</span>
          <h3>Caso B — a preencher</h3>
          <dl>
            <dt>PROBLEMA</dt><dd>Segundo setor, para demonstrar amplitude da metodologia.</dd>
            <dt>INTERVENÇÃO</dt><dd>O que foi implementado, em quantos pontos e em que prazo.</dd>
            <dt>RESULTADO</dt><dd>Métrica validada para citação pública, com autorização de marca.</dd>
          </dl>
        </article>
      </div>
    </div>
  </section>
""",
)


# ---------------------------------------------------------------- CONTACTO
page(
    "contacto.html",
    "Contacto",
    "Peça uma consultoria estratégica de segurança. Telefone 923 885 379, geral@wecomp.ao, Viana Luanda Sul.",
    "con",
    hero(
        "contacto-consultoria.jpg",
        '<a href="wecomp-prototipo.html">Home</a> / Contacto',
        "Consultoria estratégica",
        "Vamos conversar sobre a sua segurança.",
        "Formulário curto. O setor é campo obrigatório para encaminhar o pedido ao especialista certo — não para uma caixa de correio genérica.",
    )
    + """
  <section style="background:var(--paper-dim);">
    <div class="wrap contact-grid">
      <div>
        <h2 style="font-size:24px; margin-bottom:20px;">Pedido de consultoria</h2>
        <form class="form" data-prototype>
          <label>Nome
            <input type="text" name="nome" required autocomplete="name">
          </label>
          <label>Empresa
            <input type="text" name="empresa" required autocomplete="organization">
          </label>
          <label>Setor
            <select name="setor" required>
              <option value="">Selecionar setor</option>
              <option>Banca e finanças</option>
              <option>Retalho e distribuição</option>
              <option>Indústria, logística e saúde</option>
              <option>Outro</option>
            </select>
          </label>
          <label>Telefone
            <input type="tel" name="telefone" required autocomplete="tel">
          </label>
          <label>Email
            <input type="email" name="email" autocomplete="email">
          </label>
          <label>Mensagem
            <textarea name="mensagem" rows="4" required placeholder="Descreva brevemente a instalação e o que precisa de resolver."></textarea>
          </label>
          <button class="btn-primary" style="align-self:flex-start; border:none;">Enviar pedido</button>
        </form>
        <div class="form-ok">Pedido registado neste protótipo. Em produção, este envio entra no routing interno por setor.</div>
      </div>
      <div>
        <div class="contact-meta">
          <span class="diff-label">TELEFONE</span>
          <p><a href="tel:+244923885379" style="text-decoration:none;">923 885 379</a></p>
        </div>
        <div class="contact-meta">
          <span class="diff-label">EMAIL</span>
          <p><a href="mailto:geral@wecomp.ao" style="text-decoration:none;">geral@wecomp.ao</a></p>
        </div>
        <div class="contact-meta">
          <span class="diff-label">LOCALIZAÇÃO</span>
          <p class="addr">Viana Luanda Sul, Rua da Vila, frente ao Hotel de Pedras</p>
        </div>
        <figure class="media-figure" style="margin-top:28px;">
          <img src="img/contacto-consultoria.jpg" alt="Reunião de consultoria entre técnico de segurança e responsáveis de empresa" width="1024" height="768" loading="lazy" decoding="async">
          <figcaption class="figcap">REUNIÃO DE ENQUADRAMENTO COM O CLIENTE</figcaption>
        </figure>
        <p class="map-note">Sem mapa embutido: a morada é operacional, não um showroom de visita espontânea. Incluir mapa apenas se a visita física fizer parte da jornada do cliente.</p>
      </div>
    </div>
  </section>

  <section>
    <div class="wrap">
      <div class="section-head">
        <div>
          <span class="section-num">O que acontece a seguir</span>
          <h2>Três passos até ter um diagnóstico.</h2>
        </div>
        <p>Nenhum deles implica compromisso de compra.</p>
      </div>
      <div class="next-steps" style="margin-top:0;">
        <div class="next-step"><div class="n">PASSO 01</div><h3>Contacto de enquadramento</h3><p>Percebemos o tipo de instalação, o setor e o problema concreto — e encaminhamos ao especialista da área.</p></div>
        <div class="next-step"><div class="n">PASSO 02</div><h3>Visita técnica</h3><p>Levantamento HIRA no local, com identificação de perigos e classificação do risco.</p></div>
        <div class="next-step"><div class="n">PASSO 03</div><h3>Proposta priorizada</h3><p>Recomendação faseada, do risco mais crítico ao menos crítico, com enquadramento legal associado.</p></div>
      </div>
    </div>
  </section>
"""
    + faq(
        [
            ("Em quanto tempo respondem?", "O pedido é encaminhado internamente pelo setor indicado no formulário. O prazo de resposta comprometido deve ser definido pela Wecomp e publicado aqui antes do lançamento."),
            ("Atendem fora de Luanda?", "Sim. A operação cobre 21 províncias e municípios, e projetos multi-província são executados com a mesma equipa técnica."),
            ("Preciso de saber que solução quero?", "Não. Se souber apenas o problema — uma vistoria em risco, um seguro a exigir requisitos, uma auditoria de SHST — o levantamento determina a solução."),
            ("Trabalham com empresas de pequena dimensão?", "A metodologia é a mesma; o que varia é a escala do levantamento e o faseamento do investimento."),
        ],
        "Antes de nos contactar.",
    ),
    cta=False,
)


# ---------------------------------------------------------------- LEGAL
page(
    "privacidade.html",
    "Política de Privacidade",
    "Política de privacidade do website Wecomp — versão de protótipo, a validar juridicamente.",
    None,
    """
  <section class="hero page-hero">
    <div class="blueprint" aria-hidden="true"></div>
    <div class="wrap hero-inner">
      <div>
        <div class="crumb"><a href="wecomp-prototipo.html">Home</a> / Política de Privacidade</div>
        <h1>Política de Privacidade</h1>
        <p class="lead">Texto jurídico a redigir pela Wecomp com aconselhamento legal. Este protótipo reserva o destino de navegação do rodapé e descreve o que a política terá de cobrir.</p>
      </div>
    </div>
  </section>
  <section class="legal-page">
    <div class="wrap prose">
      <h3>Dados recolhidos</h3>
      <p>O formulário de consultoria recolhe nome, empresa, setor, telefone, email e mensagem, com a finalidade de encaminhamento comercial interno e resposta ao pedido.</p>
      <h3>O que a versão final deve especificar</h3>
      <ul class="checklist">
        <li>Finalidade e base legal do tratamento dos dados</li>
        <li>Prazo de conservação dos dados dos formulários</li>
        <li>Entidades com acesso aos dados dentro da organização</li>
        <li>Direitos do titular e canal para os exercer</li>
        <li>Utilização de cookies e ferramentas de análise, se aplicável</li>
      </ul>
      <div class="gap" style="margin-top:28px;"><strong>Conteúdo legal em falta.</strong> Não publicar o site com este placeholder.</div>
    </div>
  </section>
""",
    cta=False,
)

page(
    "termos.html",
    "Termos",
    "Termos de utilização do website Wecomp — versão de protótipo, a validar juridicamente.",
    None,
    """
  <section class="hero page-hero">
    <div class="blueprint" aria-hidden="true"></div>
    <div class="wrap hero-inner">
      <div>
        <div class="crumb"><a href="wecomp-prototipo.html">Home</a> / Termos</div>
        <h1>Termos de utilização</h1>
        <p class="lead">Condições de utilização do website. Texto a validar juridicamente antes do lançamento.</p>
      </div>
    </div>
  </section>
  <section class="legal-page">
    <div class="wrap prose">
      <h3>O que a versão final deve cobrir</h3>
      <ul class="checklist">
        <li>Caráter informativo do conteúdo do site e ausência de valor contratual</li>
        <li>Natureza do pedido de consultoria, sem compromisso de compra</li>
        <li>Propriedade intelectual dos conteúdos, marcas e imagens</li>
        <li>Citação de clientes e utilização de logótipos apenas com autorização</li>
        <li>Limitação de responsabilidade e lei aplicável</li>
      </ul>
      <div class="gap" style="margin-top:28px;"><strong>Conteúdo legal em falta.</strong> Não publicar o site com este placeholder.</div>
    </div>
  </section>
""",
    cta=False,
)

print("Geradas", len(list(ROOT.glob("*.html"))), "páginas HTML")

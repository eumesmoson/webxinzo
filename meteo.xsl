<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="1.0" encoding="utf-8" omit-xml-declaration="yes"/>
<xsl:template match="Estacion">

<div style="color:white;overflow:hidden;left:2%; width:99%;height:99%;border-color:purple;border-style:inset">
<p style="font-size:12px;font-weight:bold">&#160;&#160;&#160;&#160;&#160;DATA MEDICION:<xsl:value-of select="Valores/@Data"/></p>
<hr/>
<table border="0" style="font-size:12px;">
<tr>
<td>Velocidade do Vento:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='81'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>m/s</td>
</tr>
<tr>
<td>Temperatura M&#233;dia do Aire:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='83'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C </td>
</tr>
<tr>
<td>Temperatura Max. do Aire:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='84'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C  </td>
</tr>
<tr>
<td>Temperatura Min. do Aire:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='85'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C </td>
</tr>
<tr>
<td>Humidade Relativa Med.:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='86'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>% </td>
</tr>
<tr>
<td>Temperatura do Orballo</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10018'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C </td>
</tr>
<tr>
<td>Horas de Humidade Foliar:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='9991'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>Horas</td>
</tr>
<tr>
<td>Chuvia:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10001'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>L m&#178;</td>
</tr>
<tr>
<td>Refacho:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10003'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>m/s</td>
</tr>
<tr>
<td>Humidade Rel. Max.:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10004'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>%</td>
</tr>
<tr>
<td>Humidade Rel. Min.:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10005'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>%</td>
</tr>
<tr>
<td>Horas de Sol:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10006'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>Horas</td>
</tr>
<tr>
<td>Irradiaci&#243;n Global Diaria:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10013'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>10 Kj (m&#178;/d)</td>
</tr>
<tr>
<td>Direcci&#243;n do Refacho</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10015'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; </td>
</tr>
<tr>
<td>Temperatura do Orballo</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10018'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C </td>
</tr>
<tr>
<td>Temperatura do Solo a 10 cm:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10021'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C </td>
</tr>
<tr>
<td>Temperatura do Aire a 10cm:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10022'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186; C </td>
</tr>
<tr>
<td>Humidade do Solo</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10056'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>KPa</td>
</tr>
<tr>
<td>Horas de Frio menos 7</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10063'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>Horas</td>
</tr>
<tr>
<td>Insolaci&#243;n</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10106'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>%</td>
</tr>
<tr>
<td>Balance Hidrico</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10117'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>mm</td>
</tr>
<tr>
<td>Direcci&#243;n Vento Predominante</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10124'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>&#186;</td>
</tr>
<tr>
<td>Evaporaci&#243;n de Ref.:</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='10129'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>mm</td>
</tr>
<tr>
<td>Horas de Luz</td>
<td><xsl:for-each select="Valores/Medida"><xsl:if test="@Codigo_validacion='1'"><xsl:if test="@ID='9990'"><xsl:value-of select="@Valor"/></xsl:if></xsl:if></xsl:for-each></td>
<td>Horas</td>
</tr>
</table>
<hr/>  
</div>
</xsl:template>
</xsl:stylesheet>



<?xml version='1.0' encoding='utf-8' ?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:output method="xml"/>
   <xsl:template match="purchaseOrder">
    <purchaseOrder>
      <xsl:apply-templates/>
    </purchaseOrder>
   </xsl:template>
   <xsl:template match="@*|*|text()">
    <xsl:copy>
     <xsl:apply-templates select="@*|*|text()"/>
    </xsl:copy>
   </xsl:template>
   <xsl:template match="items">
    <items>
     <xsl:for-each select="item">
      <xsl:element name="{name()}">
        <xsl:for-each select="@*">
          <xsl:element name="{name()}">
            <xsl:value-of select="."/>
          </xsl:element>
         </xsl:for-each>
         <xsl:for-each select="*">
          <xsl:choose>
           <xsl:when test="name()='price'">
            <price>
             <_>
              <xsl:value-of select="."/>
             </_>
             <xsl:for-each select="@*">
              <xsl:element name="{name()}">
               <xsl:value-of select="."/>
              </xsl:element>
             </xsl:for-each>
            </price>
           </xsl:when>
           <xsl:otherwise>
            <xsl:element name="{name()}">
             <xsl:value-of select="."/>
            </xsl:element>
           </xsl:otherwise>
          </xsl:choose>
         </xsl:for-each>
        </xsl:element>
     </xsl:for-each>
    </items>
   </xsl:template>
</xsl:stylesheet>
